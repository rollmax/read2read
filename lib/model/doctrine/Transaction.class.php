<?php

/**
 * Transaction
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    read2read
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Transaction extends BaseTransaction
{

    /**
     * U_user purchase content: Transfer money from u_user to system
     *
     * @param <User> $user - instance of User purchased content
     * @param <int> $content_id - purchased article ID
     * @return bool
     */
    public function purchaseContent(User $u_user, $content_id)
    {
        $article = ContentTable::getInstance()->getArticleForSale($content_id);
        if (!is_object($article)) {
            return false;
        }

        $p_user = $article->getTranslator();

        $this->setOperation('purchase');
        $this->setPeriod(Period::getCurrentPeriod());
        $this->setAmount($article->getPrice());
        $r2r_price = ((int)($article->getPrice() * Setting::getR2RPercent())) / 100;
        $p_user_price = $article->getPrice() - $r2r_price;
        $this->setIdSender($u_user->getId());
        $this->setIdReceiver($p_user->getId());

        // Update U_User balance
        $this->setSenderBalanceBefore($u_user->getBalans());
        $u_user->setBalans($u_user->getBalans() - $this->getAmount());
        $this->setSenderBalanceAfter($u_user->getBalans());
        // Save U_User balance
        $u_user->save();
        $u_user = null;
        $p_user = null;

        // System balance
        if (!$systemBalance = BalanceSystem::getCurrentBalanceInstance()) {
            return false;
        }

        // u_user Charges
        $systemBalance->setChargesUser($systemBalance->getChargesUser() + $this->getAmount());

        // get p_user tariff plan
        $article_user_tariff = $article->getPUserTariff();
        // p_user to pay and stats adn R2R summ
        if ($article_user_tariff == 'standart') {
            $systemBalance->setToPayStandart($systemBalance->getToPayStandart() + $p_user_price);
            $systemBalance->setSalesStandart($systemBalance->getSalesStandart() + 1);
            $systemBalance->setR2rStandart($systemBalance->getR2rStandart() + $r2r_price);
        } elseif ($article_user_tariff == 'expert') {
            $systemBalance->setToPayExpert($systemBalance->getToPayExpert() + $p_user_price);
            $systemBalance->setSalesExpert($systemBalance->getSalesExpert() + 1);
            $systemBalance->setR2rExpert($systemBalance->getR2rExpert() + $r2r_price);
        } elseif ($article_user_tariff == 'super') {
            $systemBalance->setToPaySuper($systemBalance->getToPaySuper() + $p_user_price);
            $systemBalance->setSalesSuper($systemBalance->getSalesSuper() + 1);
            $systemBalance->setR2rSuper($systemBalance->getR2rSuper() + $r2r_price);
        }
        // Save system balance
        $systemBalance->save();
        $systemBalance = null;

        // BalanceUser u_user: update purchase stats
        if (!$userBalance = BalanceUserTable::getInstance()->findOneByIdUser($this->getIdSender())) {
            $userBalance = new BalanceUser();
            $userBalance->setPeriod(Period::getCurrentPeriod());
            $userBalance->setIdUser($this->getIdSender());
        }
        // Save U_User purchase stats
        $userBalance->setSellPurchaseCnt($userBalance->getSellPurchaseCnt() + 1);
        $userBalance->setAmount($userBalance->getAmount() + $this->getAmount());
        // save data
        $userBalance->save();
        $userBalance = null;

        // BalanceUser p_user: update sell stats
        // Receiver: P_User balance
        if (!$userBalance = BalanceUserTable::getInstance()->findOneByIdUser($this->getIdReceiver())) {
            $userBalance = new BalanceUser();
            $userBalance->setPeriod(Period::getCurrentPeriod());
            $userBalance->setIdUser($this->getIdReceiver());
        }
        // Transaction
        $this->setReceiverBalanceBefore($userBalance->getAmount());
        // p_user
        $userBalance->setSellPurchaseCnt($userBalance->getSellPurchaseCnt() + 1);
        $userBalance->setAmount($userBalance->getAmount() + $this->getAmount());
        $userBalance->setPayable($userBalance->getPayable() + $this->getAmount() - $r2r_price);
        // transaction
        $this->setReceiverBalanceAfter($userBalance->getAmount());
        // save data
        $userBalance->save();
        $userBalance = null;

        // Save transaction
        $this->save();

        return true;
    }

    /**
     * Creates the add_funds transaction and returns saved transaction object on success, false - on failure
     *
     * @param <string> $userType
     * @param <float> $amount
     * @param <integer> $idSender
     * @param <integer> $idReciever
     * @param <float> $senderBalanceBefore
     * @param <float> $recieverBalanceBefore
     * @return <bool> false
     * @return <Doctrine_Object> instance of Transaction
     */
    public function addFunds($userType, $amount, $idSender = null, $senderBalanceBefore = 0)
    {
        $idReceiver = $idSender;
        $receiverBalanceBefore = $senderBalanceBefore;

        if (null === $idReceiver && null === $idSender) {
            return false;
        }
        if (!Period::getCurrentPeriod()) {
            return false;
        }

        $this->setPeriod(Period::getCurrentPeriod());
        $this->setOperation('deposit_' . $userType);

        $this->setAmount($amount);


        $this->setIdSender($idSender);
        $this->setSenderBalanceBefore($senderBalanceBefore);

        $this->setIdReceiver($idReceiver);
        $this->setReceiverBalanceBefore($receiverBalanceBefore);

        $this->setSenderBalanceAfter($this->getSenderBalanceBefore() + $amount);
        $this->setReceiverBalanceAfter($this->getReceiverBalanceBefore() + $amount);

        // here may add some nodes

        $this->save();
        if (!$this->getId()) {
            return false;
        }

        return $this;

    }

    public function puserDailyPayment(User $oUser, BalanceSystem $oBalanceSystem, array &$aTariffs)
    {
        $this->setPeriod(Period::getCurrentPeriod());
        $this->setOperation('charges_service');

        $fAmount = $aTariffs[$oUser->getTariff()];
        $this->setAmount($fAmount);
        // Sender
        $this->setIdSender($oUser->getId());
        $this->setSenderBalanceBefore($oUser->getBalans());
        // Set user balance and save
        $itog = $oUser->getBalans() - $fAmount;
        if ($itog < 0) {
            $oUser->setIsBlocked(1);
            $oUser->save();
            return;
        }
        $oUser->setBalans($oUser->getBalans() - $fAmount);
        $oUser->save();
        //
        $this->setSenderBalanceAfter($oUser->getBalans());

        // Recipient - Read2Read
        $this->setIdReceiver(0);
        $this->setReceiverBalanceBefore(0);
        $this->setReceiverBalanceAfter(0);

        $sGetMethod = 'getCharges' . ucfirst($oUser->getTariff());
        $sSetMethod = 'setCharges' . ucfirst($oUser->getTariff());
        $bal = $oBalanceSystem->$sGetMethod();
        $bal += $fAmount;
        $oBalanceSystem->$sSetMethod($bal);
        $oBalanceSystem->save();


        // Save transaction
        $this->save();
    }

}
