<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aleksxor
 * Date: 26.09.12
 * Time: 17:35
 */


class OnPay
{

    private $onpay_login = null;
    // секретный код вашего интернет ресурса. Этот код указывается в вашем кабинете в настройках
    private $private_code = null;
    // URL куда следует вернуться после выполнения первого шага оплаты
    private $url_success = '';
    // флаг - использовать таблицу балансов пользователей, если установлен false, то метод
    // data_update_user_balance переопределять не надо, он не будет вызываться

    // айди транзакции по которой идет обработка платежа
    private $pay_for = null;
    // айди юзера который инициировал транзакцию
    private $user_id = null;
    private $sum = null;
    private $md5check = null;

    public $currency = 'RUR';


    /*
     * функция возвращает объект OnPay для транзакции переданной в нее
     * создана для совместимости с системой транзакций
     */
    public static function forTransaction(Transaction $transaction, $url_success='')
    {
        $u_id = $transaction->getIdReceiver();
        $u = UserTable::getInstance()->findOneById($u_id);

        switch ($u->getUtype()) {
            case 'puser':
                $onpay_login = SettingTable::getInstance()->findOneByName('pOnpayLogin')->getValue();
                $private_code = SettingTable::getInstance()->findOneByName('pApiCode')->getValue();
                break;

            case 'uuser':
                $onpay_login = SettingTable::getInstance()->findOneByName('uOnpayLogin')->getValue();
                $private_code = SettingTable::getInstance()->findOneByName('uApiCode')->getValue();
                break;

            default:
                throw new sfException('Неизвестный тип пользователя в транзакции при инициализации платежа OnPay');
                break;
        }


        return new OnPay(
            $onpay_login,
            $private_code,
            $transaction->getId(),
            $transaction->getAmount(),
            $url_success
        );
    }

    public function __construct($onpay_login, $private_code, $pay_for, $sum, $url_success)
    {
        $this->url_success = $url_success;
        $this->onpay_login = $onpay_login;
        $this->private_code = $private_code;
        $this->pay_for = $pay_for;
        $this->sum = $sum;

        $sumformd5 = self::to_float($this->sum); //преобразуем число к числу с плавающей точкой
        //создаем хеш данных для проверки безопасности
        $this->md5check = md5('fix;' . $sumformd5 . ';' . $this->currency . ';' . $this->pay_for . ';yes;' . $this->private_code);
    }

    private function getIframeUrlParams()
    {
        return 'pay_mode=fix&pay_for=' . $this->pay_for . '&price=' . $this->sum .
            '&currency=' . $this->currency . '&convert=yes&md5=' . $this->md5check . '&url_success=' . $this->url_success;
    }

    private static function to_float($sum)
    {
        if (strpos($sum, ".")) {
            $sum = round($sum, 2);
        } else {
            $sum = $sum.".0";
        }
        return $sum;

    }

    public function processFirstStep()
    {
        //создаем строчку для запроса
        $url = 'http://secure.onpay.ru/pay/' . $this->onpay_login . '?' . $this->getIframeUrlParams();
        return $url;
    }

    public function processApiRequest(
        $type,
        $order_amount,
        $order_currency,
        $pay_for,
        $md5,
        $onpay_id=null,
        $balance_amount=null,
        $balance_currency=null,
        $exchange_rate=null,
        $paymentDateTime=null
    )
    {
        $rezult = '';
        $error = '';
        //проверяем чек запрос
        if ($type == 'check') {
            // проверим совпадает ли сумма и валюта операции
            if ($this->sum == $order_amount and $order_currency == $this->currency ) {
                //выдаем ответ OK на чек запрос
                $rezult = $this->answer($type, 0, $pay_for, $order_amount, $order_currency, 'OK');
            } else {
                $rezult = $this->answer($type, 1, $pay_for, $order_amount, $order_currency, 'Wrong sum or currency');
            }
        }

        //проверяем запрос на пополнение
        if ($type == 'pay') {

            //производим проверки входных данных
            if (empty($onpay_id)) {$error .="Не указан id<br>";}
            else {if (!is_numeric(intval($onpay_id))) {$error .="Параметр не является числом<br>";}}
            if (empty($order_amount)) {$error .="Не указана сумма<br>";}
            else {if (!is_numeric($order_amount)) {$error .="Параметр не является числом<br>";}}
            if (empty($balance_amount)) {$error .="Не указана сумма<br>";}
            else {if (!is_numeric(intval($balance_amount))) {$error .="Параметр не является числом<br>";}}
            if (empty($balance_currency)) {$error .="Не указана валюта<br>";}
            else {if (strlen($balance_currency)>4) {$error .="Параметр слишком длинный<br>";}}
            if (empty($order_currency)) {$error .="Не указана валюта<br>";}
            else {if (strlen($order_currency)>4) {$error .="Параметр слишком длинный<br>";}}
            if (empty($exchange_rate)) {$error .="Не указана сумма<br>";}
            else {if (!is_numeric($exchange_rate)) {$error .="Параметр не является числом<br>";}}

            //если нет ошибок
            if (!$error) {
                if (is_numeric($pay_for)) {

                    //Если pay_for - число
                    $sum = floatval($order_amount);

                    if (($transaction = TransactionTable::getInstance()->findOneById($pay_for)) instanceof Transaction) {
                        //создаем строку хэша с присланных данных
                        $md5fb = strtoupper(md5($type.";".$pay_for.";".$onpay_id.";".$order_amount.";".$order_currency.";".$this->private_code));
                        //сверяем строчки хеша (присланную и созданную нами)
                        if ($md5fb != $md5) {
                            $rezult = $this->answerpay($type, 8, $pay_for, $order_amount, $order_currency, 'Md5 signature is wrong. Expected '.$md5fb, $onpay_id);
                        } else {

                            $rezult_balance = User::addFundsFin($transaction);

                            //если оба запроса прошли успешно выдаем ответ об удаче, если нет, то о том что операция не произошла
                            if ($rezult_balance) {
                                $rezult = $this->answerpay($type, 0, $pay_for, $order_amount, $order_currency, 'OK', $onpay_id);
                            } else {
                                $rezult = $this->answerpay($type, 9, $pay_for, $order_amount, $order_currency, 'Error in mechant database queries: operation or balance tables error', $onpay_id);
                            }
                        }
                    } else {
                        $rezult = $this->answerpay($type, 10, $pay_for, $order_amount, $order_currency, 'Cannot find any pay rows acording to this parameters: wrong payment', $onpay_id);
                    }
                } else {
                    //Если pay_for - не правильный формат
                    $rezult = $this->answerpay($type, 11, $pay_for, $order_amount, $order_currency, 'Error in parameters data', $onpay_id);
                }
            } else {
                //Если есть ошибки
                $rezult = $this->answerpay($type, 12, $pay_for, $order_amount, $order_currency, 'Error in parameters data: '.$error, $onpay_id);
            }
        }
        return $rezult;

    }

    //функция выдает ответ для сервиса onpay в формате XML на чек запрос
    private function answer($type, $code, $pay_for, $order_amount, $order_currency, $text) {
        $md5 = strtoupper(md5("$type;$pay_for;$order_amount;$order_currency;$code;".$this->private_code));
        return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<result>\n<code>$code</code>\n<pay_for>$pay_for</pay_for>\n<comment>$text</comment>\n<md5>$md5</md5>\n</result>";
    }

    //функция выдает ответ для сервиса onpay в формате XML на pay запрос
    private function answerpay($type, $code, $pay_for, $order_amount, $order_currency, $text, $onpay_id) {
        $md5 = strtoupper(md5("$type;$pay_for;$onpay_id;$pay_for;$order_amount;$order_currency;$code;".$this->private_code));
        return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<result>\n<code>$code</code>\n<comment>$text</comment>\n<onpay_id>$onpay_id</onpay_id>\n<pay_for>$pay_for</pay_for>\n<order_id>$pay_for</order_id>\n<md5>$md5</md5>\n</result>";
    }

}
