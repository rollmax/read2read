<?php

/**
 * registration actions.
 *
 * @package    read2read
 * @subpackage registration
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registrationActions extends sfActions
{

    public function  preExecute()
    {
        if (!$this->getUser()->isAnonymous())
            $this->redirect('@homepage');
    }

    /**
     * Executes registration uuser action
     *
     * @param sfRequest $request A request object
     */
    public function executeRegu(sfWebRequest $request)
    {
        $this->form = new RegisterUserUForm();
    }

    /**
     * Executes registration puser action
     *
     * @param sfWebRequest $request
     */
    public function executeRegp(sfWebRequest $request)
    {
        $this->form = new RegisterUserPForm();
    }

    /**
     * Registration new User
     *
     * @param sfWebRequest $request
     */
    public function executeCreateu(sfWebRequest $request)
    {
        $this->form = new RegisterUserUForm();

        if (!$this->processForm($request, $this->form))
            $this->setTemplate('regu');
        else {
            //$this->user = $this->saveForm($this->form);
            $data = $request->getParameter($this->form->getName());//;die;
            $this->user = new User;
            $this->user->setLogin($data['login']);
            $this->user->setEmail($data['email']);
            $this->getUser()->setAttribute('reg_user_form', $this->form);
            $this->getUser()->setAttribute('reg_user', $this->user);
            $this->setTemplate('confirmation');
        }
    }

    public function executeCreatep(sfWebRequest $request)
    {
        $this->form = new RegisterUserPForm();

        if (!$this->processForm($request, $this->form))
            $this->setTemplate('regp');
        else {
            //$this->user = $this->saveForm($this->form);
            $data = $request->getParameter($this->form->getName());//;die;
            $this->user = new User;
            $this->user->setLogin($data['login']);
            $this->user->setEmail($data['email']);
            $this->user->setTariff($data['tariff']);
            $this->user->setUtype('puser');
            $this->getUser()->setAttribute('reg_user_form', $this->form);
            $this->getUser()->setAttribute('reg_user', $this->user);
            $this->setTemplate('confirmation');
        }
    }

    /**
     * Exutes confirm action
     *
     * @param sfWebRequest $request
     */
    public function executeConfirmation(sfWebRequest $request)
    {
        $this->form = $this->getUser()->getAttribute('reg_user_form');
        if ($this->form) {
            //$user = $this->getRoute()->getObject();
            $user = $this->saveForm($this->form);
            $message = $this->getMailer()->compose(
                sfConfig::get('app_r2r_noreply_email'),
                $user->getEmail(),
                'r2r - activation',
                <<<EOF
                              Вы зарегистрировались на сайте http://www.read2read.ru

Ваш логин: {$user->getLogin()}
Для активации пользователя перейдите по адресу: {$this->generateUrl('user_activate', $user, true)}
EOF
            );
            $this->getMailer()->send($message);
        }

        $this->redirect('@homepage');
    }

    /**
     * Saves form
     *
     * @param sfForm $form
     * @param <string> $utype
     * @return User $user
     */
    protected function saveForm(sfForm $form)
    {
        $user = $form->save();

        $group = UserGroupTable::getInstance()->findOneBy('name', $user->getUtype());

        $userGroup = new User__Group();
        $userGroup->setUser($user);
        $userGroup->setGroup($group);
        $userGroup->save();

        $userBalance = new BalanceUser();
        $userBalance->setPeriod(Period::getCurrentPeriod());
        $userBalance->setUser($user);
        $userBalance->save();

        $user->setIsBlocked(true);
        $user->setActivationCode(sha1($user->getEmail() . mt_rand(10, 15)));

        $user->save();

        return $user;
    }


    /**
     * Process registration form
     *
     * @param sfWebRequest $request
     * @param sfForm $form
     * @return <boolean>
     */
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()));
        if ($form->isValid())
            return true;
        return false;
    }

    /**
     * Executes activate action
     *
     * @param sfWebRequest $request
     */
    public function executeActivate(sfWebRequest $request)
    {
        $this->form = new UserActivationForm();
        $this->user = $this->getRoute()->getObject();
    }

    public function executeGetPassword(sfWebRequest $request)
    {
        $this->forward404Unless($this->user = $this->getRoute()->getObject());

        $form = new UserActivationForm();
        //$this->user = $this->getRoute()->getObject();
new User;
        $form->bind($request->getParameter($form->getName()));


        if ($form->isValid()) {
            $data = $form->getValues();

            if ($data['login_check'] == $this->user->getLogin()) {
                if ($this->user->getActivationCode() == '')
                    $this->redirect('@homepage');

                $this->password = $this->user->generatePassword();

                $this->user->setPassword($this->password);
                $this->user->setActivationCode('');
                $this->user->setActive(true);
                // Generate Image
                $this->user->generateImg();

                $this->user->save();
                // Init Image URL
                $this->imgUrl = sfConfig::get('app_secret_img_url_dir') . '/' . $this->user->getImgFileName() . '?p=' . rand(1, 990000);
            } else
                $this->redirect('@homepage');
        } else
            $this->redirect('@homepage');
    }

    public function executeGetPasswordok()
    {
        $this->forward404Unless($user = $this->getRoute()->getObject());
        //@unlink(sfConfig::get('sf_upload_dir') . sfConfig::get('app_secret_img_path_dir') . '/' . $user->getImgFileName());
        $this->redirect('@homepage');
    }

    /**
     * Activate new PSW
     *
     * @param sfWebRequest $request
     */
    public function executeActivatepsw(sfWebRequest $request)
    {
        $this->forward404Unless($user = $this->getRoute()->getObject());

        if ($request->getMethod() == 'POST') {
            $user->setActivationCode('');
            $user->setActive(true);
            $user->save();
            $this->redirect('@user_activate_change_psw_ok');
            return;
        }

        $this->password = $user->generatePassword();
        $user->setPassword($this->password);
        $user->save();
    }

    public function executeActivatepswok()
    {

    }

}
