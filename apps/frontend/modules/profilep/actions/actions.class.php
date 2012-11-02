<?php

/**
 * profilep actions.
 *
 * @package    read2read
 * @subpackage profilep
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profilepActions extends sfActions
{
    /**
     * Show CV
     *
     * @param sfWebRequest $request
     */
    public function executeCv(sfWebRequest $request)
    {
        $this->user = $this->getUser()->getGuardUser();
    }

    /**
     * Executes cvChangeResume
     *
     * @param sfWebRequest $request
     */
    public function executeCvChangeResume(sfWebRequest $request)
    {
        $this->form = new UserResumeForm($this->getUser()->getGuardUser());
    }

    /**
     * Executes cvUpdateResume
     *
     * @param sfWebRequest $request
     */
    public function executeCvUpdateResume(sfWebRequest $request)
    {
        $this->form = new UserResumeForm($this->getUser()->getGuardUser());

        if ($this->processUserForm($request, $this->form) !== true) {
            $this->setTemplate('cvChangeResume');
        }

        $this->user = $this->getUser()->getGuardUser();

    }

    /**
     * Executes changeFirstName
     *
     * @param sfWebRequest $request
     */
    public function executeChangeFirstName(sfWebRequest $request)
    {
        $this->form = new UserFirstNameForm($this->getUser()->getGuardUser());
    }

    /**
     * Executes updateFirstName
     *
     * @param sfWebRequest $request
     */
    public function executeUpdateFirstName(sfWebRequest $request)
    {
        $this->form = new UserFirstNameForm($this->getUser()->getGuardUser());

        if ($this->processUserForm($request, $this->form) !== true) {
            $this->setTemplate('changeFirstName');
        }

        $this->user = $this->getUser()->getGuardUser();

    }

    /**
     * Executes changeLastName
     *
     * @param sfWebRequest $request
     */
    public function executeChangeLastName(sfWebRequest $request)
    {
        $this->form = new UserLastNameForm($this->getUser()->getGuardUser());
    }

    /**
     * Executes UpdateLastName
     *
     * @param sfWebRequest $request
     */
    public function executeUpdateLastName(sfWebRequest $request)
    {
        $this->form = new UserLastNameForm($this->getUser()->getGuardUser());

        if ($this->processUserForm($request, $this->form) !== true) {
            $this->setTemplate('changeLastName');
        }

        $this->user = $this->getUser()->getGuardUser();

    }

    /**
     * Executes changeLivePlace
     *
     * @param sfWebRequest $request
     */
    public function executeChangeLivePlace(sfWebRequest $request)
    {
        $this->form = new UserLivePlaceForm($this->getUser()->getGuardUser());
    }

    /**
     * Executes UpdateLivePlace
     *
     * @param sfWebRequest $request
     */
    public function executeUpdateLivePlace(sfWebRequest $request)
    {
        $this->form = new UserLivePlaceForm($this->getUser()->getGuardUser());

        if ($this->processUserForm($request, $this->form) !== true) {
            $this->setTemplate('changeLivePlace');
        }

        $this->user = $this->getUser()->getGuardUser();

    }

    /**
     * Executes changePhone
     *
     * @param sfWebRequest $request
     */
    public function executeChangePhone(sfWebRequest $request)
    {
        $this->form = new UserPhoneForm($this->getUser()->getGuardUser());
    }

    /**
     * Executes UpdatePhone
     *
     * @param sfWebRequest $request
     */
    public function executeUpdatePhone(sfWebRequest $request)
    {
        $this->form = new UserPhoneForm($this->getUser()->getGuardUser());

        if ($this->processUserForm($request, $this->form) !== true) {
            $this->setTemplate('changePhone');
        }

        $this->user = $this->getUser()->getGuardUser();

    }


    /**
     * Executes changeSkype
     *
     * @param sfWebRequest $request
     */
    public function executeChangeSkype(sfWebRequest $request)
    {
        $this->form = new UserSkypeForm($this->getUser()->getGuardUser());
    }

    /**
     * Executes UpdateSkype
     *
     * @param sfWebRequest $request
     */
    public function executeUpdateSkype(sfWebRequest $request)
    {
        $this->form = new UserSkypeForm($this->getUser()->getGuardUser());

        if ($this->processUserForm($request, $this->form) !== true) {
            $this->setTemplate('changeSkype');
        }

        $this->user = $this->getUser()->getGuardUser();

    }

    /**
     * Executes changeSite
     *
     * @param sfWebRequest $request
     */
    public function executeChangeSite(sfWebRequest $request)
    {
        $this->form = new UserSiteForm($this->getUser()->getGuardUser());
    }

    /**
     * Executes UpdateSite
     *
     * @param sfWebRequest $request
     */
    public function executeUpdateSite(sfWebRequest $request)
    {
        $this->form = new UserSiteForm($this->getUser()->getGuardUser());

        if ($this->processUserForm($request, $this->form) !== true) {
            $this->setTemplate('changeSite');
        }

        $this->user = $this->getUser()->getGuardUser();

    }

    /**
     * Executes changeConstMsg
     *
     * @param sfWebRequest $request
     */
    public function executeChangeConstMsg(sfWebRequest $request)
    {
        $this->form = new UserConstMsgForm($this->getUser()->getGuardUser());
        $this->titleName = 'Постоянное сообщение пользователя';
        $this->fieldName = 'const_msg';
        $this->routeName = 'profile_p_const_msg_update';
        $this->cssId = 'const-msg';

        $this->setTemplate('changeInputText');
    }

    /**
     * Executes UpdateConstMsg
     *
     * @param sfWebRequest $request
     */
    public function executeUpdateConstMsg(sfWebRequest $request)
    {
        // crating form
        $this->form = new UserConstMsgForm($this->getUser()->getGuardUser());

        // install const values
        $this->titleName = 'Постоянное сообщение пользователя';
        $this->cssId = 'const-msg';
        // process form
        if ($this->processUserForm($request, $this->form) !== true) {
            $this->fieldName = 'const_msg';
            $this->routeName = 'profile_p_const_msg_update';
            $this->setTemplate('changeInputText');
        } else {
            $this->user = $this->getUser()->getGuardUser();
            $this->routeName = 'profile_p_const_msg';
            $this->value = $this->user->getConstMsgUserPanel();
            $this->setTemplate('updateInputText');
        }


    }


    /**
     * Executes changeConstMsg
     *
     * @param sfWebRequest $request
     */
    public function executeChangeUserpic(sfWebRequest $request)
    {
        $this->form = new UserUserpicForm($this->getUser()->getGuardUser());
        $this->titleName = 'Юзерпик';
        $this->fieldName = 'userpic';
        $this->routeName = 'profile_p_userpic_update';
        $this->cssId = 'userpic';

        $this->setTemplate('changeInputFile');
    }

    /**
     * Executes UpdateConstMsg
     *
     * @param sfWebRequest $request
     */
    public function executeUpdateUserpic(sfWebRequest $request)
    {
        // crating form
        $this->form = new UserUserpicForm($this->getUser()->getGuardUser());

        // install const values
        $this->user = $this->getUser()->getGuardUser();
        $this->settings = Doctrine::getTable('Setting')->find(1);

        // process form
        if ($this->processUserForm($request, $this->form) !== true) {
            $this->setTemplate('index');
        }
        $this->setTemplate('index');


    }

    /**
     * Executes cvChangeAvatar
     *
     * @param sfWebRequest $request
     */
    public function executeCvChangeAvatar(sfWebRequest $request)
    {
        $this->form = new UserAvatarForm($this->getUser()->getGuardUser());
    }

    /**
     * Executes cvUpdateAvatar
     *
     * @param sfWebRequest $request
     */
    public function executeCvUpdateAvatar(sfWebRequest $request)
    {
        $this->form = new UserAvatarForm($this->getUser()->getGuardUser());
        $this->user = $this->getUser()->getGuardUser();


        if ($this->processUserForm($request, $this->form) !== true) {
            $this->setTemplate('cvUpdateAvatar');
        } else {
            $this->setTemplate('cv');
        }
    }


    /**
     * Show Contacts
     *
     * @param sfWebRequest $request
     */
    public function executeContacts(sfWebRequest $request)
    {
        $this->user = $this->getUser()->getGuardUser();
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->user = $this->getUser()->getGuardUser();
        $this->settings = Doctrine::getTable('Setting')->find(1);
    }

    /**
     * Executes changeTariff action
     *
     * @param sfRequest $request A request object
     */
    public function executeChangeTariff(sfWebRequest $request)
    {
        $this->form = new UserTariffForm($this->getUser()->getGuardUser());
    }

    /**
     * Executes updateTariff action
     *
     * @param sfRequest $request A request object
     */
    public function executeUpdateTariff(sfWebRequest $request)
    {
        $this->form = new UserTariffForm($this->getUser()->getGuardUser());

        if ($this->processUserForm($request, $this->form) !== true) {
            $this->setTemplate('changeTariff');
        }

        $this->user = $this->getUser()->getGuardUser();
    }


    /**
     * Executes changeTariff action
     *
     * @param sfRequest $request A request object
     */
    public function executeChangeBalance(sfWebRequest $request)
    {
        $this->form = new UserBalanceForm($this->getUser()->getGuardUser());
        $this->titleName = 'Сумма на счету пользования';
        $this->fieldName = 'balance_add';
        $this->routeName = 'profile_p_balance_update';
        $this->cssId = 'balance';

        $this->setTemplate('changeInputText');
    }

    /**
     * Executes updateTariff action
     *
     * @param sfRequest $request A request object
     */
    public function executeUpdateBalance(sfWebRequest $request)
    {
        // crating form
        $this->form = new UserBalanceForm($this->getUser()->getGuardUser());

        // install const values
        $this->titleName = 'Сумма на счету пользования';
        $this->cssId = 'balance';
        // process form
        $balance = $this->processUserForm($request, $this->form);
        if ($balance === true) {
//      $this->user       = $this->getUser()->getGuardUser();
//      $this->routeName  = 'profile_p_balance';
//      $this->value      = $balance;
//      $this->btnText    = 'Пополнить счет';
//      $this->setTemplate('updateInputText');
            echo json_encode(array('redirect' => $this->generateUrl('profile_p_user')));
            exit;
        } elseif ($balance instanceof sfForm) {
            $this->fieldName = 'balance';
            $this->routeName = 'profile_p_balance_update';
            $this->setTemplate('changeInputText');
        } else {
            echo json_encode(array('redirect' => $balance));
            exit;
        }
    }

    /**
     * Executes changeEmail action
     *
     * @param sfRequest $request A request object
     */
    public function executeChangeEmail(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $this->form = new UserEmailForm($this->getUser()->getGuardUser());
    }

    public function executeChangeContactEmail(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $this->form = new UserContactEmailForm($this->getUser()->getGuardUser());
    }

    /**
     * Executes update action
     *
     * @param sfWebRequest $request A request object
     */
    public function executeUpdateEmail(sfWebRequest $request)
    {
        $form = new UserEmailForm($this->getUser()->getGuardUser());
        $processed = $this->processUserForm($request, $form);
        if ($processed !== true) {
            $this->form = $processed;
            $this->setTemplate('changeEmail');
        }

        $this->user = $this->getUser()->getGuardUser();
    }

    public function executeUpdateContactEmail(sfWebRequest $request)
    {
        $this->user = $this->getUser()->getGuardUser();
        $form = new UserContactEmailForm($this->user);

        $processed = $this->processUserForm($request, $form);
        if ($processed !== true) {
            $this->form = $processed;
            $this->setTemplate('changeContactEmail');
        }
    }


    public function executeChangePassword(sfWebRequest $request)
    {
        $this->form = new UserPasswordImgForm($this->getUser()->getGuardUser());
    }

    /**
     * Execute Change Password (with Image) action
     *
     * @param sfWebRequest $request
     */
    public function executePwschange(sfWebRequest $request)
    {
        $this->user = $this->getUser()->getGuardUser();
        $this->form = new UserPasswordImgForm($this->getUser()->getGuardUser());

        if (!$this->processPswChangeForm($request, $this->form)) {
            $this->redirect('profile_p_psw_change_err');

            return;
        }
        $this->redirect('profile_p_psw_change_ok');
    }

    public function executePwschangeerror()
    {
    }

    public function executePwschangeok(sfWebRequest $request)
    {
        if ($request->getMethod() == 'POST') {
            //
            $user = $this->getUser()->getGuardUser();
            $user->setActivationCode(sha1($user->getEmail() . mt_rand(10, 15)));
            $user->save();
            $message = $this->getMailer()->compose(
                sfConfig::get('app_r2r_noreply_email'),
                $user->getEmail(),
                'Read2Read - Изменение Пароля',
                <<<EOF
                Вы изменяете пароль на сайте http://www.read2read.ru

Для изменения пароля перейдите по адресу: {$this->generateUrl('user_activate_change_psw', $user, true)}
EOF
            );
            $this->getMailer()->send($message);
            $log = new securityLogger($this);
            $log->logEvent(
                'Read2Read - Изменение пароля',
                <<<EOF
                Уведомление для админа.
Аккаунт [{$user->getLogin()}] на сайте read2read.ru сменил пароль.
EOF
            );

            $this->getUser()->signOut();
            $this->redirect('@homepage');
        }
    }

    public function executeUpdatePassword(sfWebRequest $request)
    {
        $form = new UserPasswordForm($this->getUser()->getGuardUser());
        $processed = $this->processUserForm($request, $form);
        if ($processed !== true) {
            $this->form = $processed;
            $this->setTemplate('changePassword');
        } else {
            $this->getUser()->signOut();
        }

    }


    protected function processUserForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName()),
            $request->getFiles($form->getName())
        );

        if ($form->isValid()) {
            $user = $this->getUser()->getGuardUser();
            if (isset($form['tariff_change'])) {
                return $user->setNewTariff($form->getValue('tariff_change'));
            } elseif (isset($form['balance_add'])) {
                $transaction = $user->addFunds($form->getValue('balance_add'));

                $pay_test = SettingTable::getInstance()->findOneByName('Платежи в тестовом режиме');

                if ((int)$pay_test->getValue() > 0) {
                    $user->addFundsFin($transaction);
                    return true;
                } else {
                    // создаем объект онпей и затем редиректим на форму платежа
                    $onpay = OnPay::forTransaction(
                        $transaction,
                        $this->generateUrl('profile_p_user', array(), true)
                    );
                    return $onpay->processFirstStep();
                }
            } else {
                $user = $form->save();
            }

            return true;
        }

        return $form;
    }

    /**
     * Executes invoice action
     *
     * @param sfWebRequest $request
     */
    public function executeInvoice(sfWebRequest $request)
    {
        $this->period = Period::getCurrentPeriod();
        $this->user = $this->getUser()->getGuardUser();
        $this->form = null;
        $this->form_type = '';
        $this->earned = $this->user->getUserBalanceByPeriodId(Period::getCurrentPeriod()->getId())->getPayable();
        $this->earnedPrev = $this->user->getUserBalanceByPeriodId(Period::getPrevPeriod()->getId());

        if ($request->getMethod() == 'POST') {
            $this->form = new UserPasswordImgForm($this->user);
            if ($this->processPswChangeForm($request, $this->form)) {
                // Input purchase ID
                $this->form_type = 'account_number';
                $this->form = new AccountNumberForm($this->user);
                $this->fieldName = 'account_number';
                $this->titleName = 'Номер кошелька';
                $this->cssId = 'account_number';
            } else {
                $this->error_img = true;
                $this->form_type = 'secure_img';
                $this->fieldName = 'account_number';
                $this->titleName = 'Изменение номера кошелька';
                $this->cssId = 'account_number';
            }
        }
    }

    protected function processPswChangeForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName()),
            $request->getFiles($form->getName())
        );

        if ($form->isValid()) {
            // Save TMP image and check
            $form->getValue('img_file_name')->save();
            $rezult = $this->user->checkSequereImg($form->getValue('img_file_name')->getSavedName());
            @unlink($form->getValue('img_file_name')->getSavedName());

            return $rezult;
        }
        if (!is_object($form->getValue('img_file_name'))) {
            return false;
        }
        if ($form->getValue('img_file_name')->getSavedName() != '') {
            @unlink($form->getValue('img_file_name')->getSavedName());
        }

        return false;
    }

    /**
     * Executes edit action
     *
     * @param sfWebRequest $request
     */
    public function executeEdit(sfWebRequest $request)
    {
        switch ($request->getParameter('fieldname')) {
            case 'account_number_img':
                $this->form = new UserPasswordImgForm($this->getUser()->getGuardUser());
                $this->fieldName = 'account_number';
                $this->titleName = 'Изменение номера кошелька';
                $this->cssId = 'account_number';
                $template = '/secureImg';
                break;

            case 'account_number':
                $this->form = new AccountNumberForm($this->getUser()->getGuardUser());
                $this->fieldName = 'account_number';
                $this->titleName = 'Номер кошелька';
                $this->cssId = 'account_number';
                $template = '/inputText';
                break;
        }

        $this->setTemplate('edit' . $template);
    }

    /**
     * Executes update action
     *
     * @param sfWebRequest $request
     */
    public function executeUpdate(sfWebRequest $request)
    {
        // get form by request
        switch ($request->getParameter('fieldname')) {
            case 'account_number':
                $this->form = new AccountNumberForm($this->getUser()->getGuardUser());
                break;
        }

        // process recieved form
        if ($this->processOneFieldForm($request, $this->form) !== true) {
            // failure
            switch ($request->getParameter('fieldname')) {
                case 'account_number':
                    $this->fieldName = 'account_number';
                    $this->titleName = 'Номер кошелька';
                    $this->cssId = 'account_number';
                    $template = '/inputText';
                    break;
            }

            $this->setTemplate('edit' . $template);
        } else {
            // success
            switch ($request->getParameter('fieldname')) {
                case 'account_number':
                    $this->fieldName = 'account_number_img';
                    $this->titleName = 'Номер кошелька';
                    $this->value = $this->form->getObject()->getAccountNumber();
                    $this->cssId = 'account_number';
                    $this->btnText = 'Изменить номер';
                    $template = '/inputText';
                    break;
            }

            $this->setTemplate('update' . $template);
        }
    }

    protected function processOneFieldForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName()),
            $request->getFiles($form->getName())
        );

        if ($form->isValid()) {
            $user = $form->save();
            $log = new securityLogger($this, $user);
            $log->logEvent(
                'Read2Read - Изменение номера кошелька',
                <<<EOF
                В Вашем аккаунте [{$user->getLogin()}] на сайте read2read.ru был изменен номер кошелька.
Если всё идет по плану, не отвечайте на это письмо, в противном случае срочно свяжитесь с саппортом.

Всего Вам.
EOF
            );

            return true;
        }

        return false;

    }
}
