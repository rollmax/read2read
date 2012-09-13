<?php

/**
 * auth actions.
 *
 * @package    read2read
 * @subpackage auth
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class authActions extends sfActions
{
    /**
     * Execute LogOut action
     *
     * @param sfWebRequest $request
     */
    public function executeLogout(sfWebRequest $request)
    {
        $this->getUser()->signOut();
        $this->redirect('@homepage');
    }

    public function executeAccessDenied($request)
    {
        $this->getResponse()->setStatusCode(403);
        return '';
    }

    public function executeBlocked(sfWebRequest $request)
    {
        $this->categories = Doctrine_Core::getTable('Category')->getMainPageList();
    }

    public function executeRecoveryPassword($request)
    {
        $this->categories = Doctrine_Core::getTable('Category')->getMainPageList();
        $this->message = 'Для восстановления пароля введите логин и нажмите "Ok"';
        $this->form = new UserActivationForm();
        if ($request->getMethod() == 'POST') {
            if (array_key_exists('activate', $request->getPostParameters())) {
                $this->form = new UserActivationForm();
                $this->form->bind($request->getParameter($this->form->getName()));
                $data = $this->form->getValues();
                if ($this->form->isValid() and isset($data['login_check']) and
                    $this->user = Doctrine::getTable('User')->findOneByLogin($data['login_check'])
                ) {
                    $this->getUser()->setAttribute('recPasForUser', $this->user);
                    $this->getUser()->setFlash('notice', '');
                    $this->forward('auth', 'recoveryPasswordImg');
                } else {
                    $this->getUser()->setFlash('notice', 'Логин не найден!');
                }
            } elseif (array_key_exists('user', $request->getPostParameters())) {
                $this->forward('auth', 'recoveryPasswordImg');
            }
        }
        //$this->user = $this->getRoute()->getObject();

    }

    public function executeRecoveryPasswordImg($request)
    {
        $this->categories = Doctrine_Core::getTable('Category')->getMainPageList();
        $this->message = 'Откройте контрольное изображение';
        if (!is_object($this->user)) $this->user = $this->getUser()->getAttribute('recPasForUser');
        $this->form = new UserPasswordImgForm($this->user);
        $files = $request->getFiles($this->form->getName());
        if ($request->getMethod() == 'POST' and array_key_exists('user', $request->getPostParameters()) and is_array($files)) {
            $this->form->bind($request->getParameter($this->form->getName()), $files);
            if ($this->form->isValid()) {
                $this->form->getValue('img_file_name')->save();
                $savedName = $this->form->getValue('img_file_name')->getSavedName();
                if ($this->user->checkSequereImg($savedName)) {
                    $this->getUser()->setAttribute('recPasForUserCount', 0);
                    $this->password = $this->user->generatePassword();
                    $this->login = $this->user->getLogin();
                    $this->user->setPassword($this->password);
                    $this->user->setActivationCode('');
                    $this->user->setActive(true);
                    $this->user->save();
                    $this->setTemplate('recoveryPasswordComplite');
                    //echo $this->password;die;
                    return sfView::SUCCESS;
                } else {

                    $this->getUser()->setFlash('notice', '<p class="warn">Контрольное изображение не верно</p>');
                    $this->getUser()->setAttribute('recPasForUserCount', $this->getUser()->getAttribute('recPasForUserCount', 0) + 1);
                    if ($this->getUser()->getAttribute('recPasForUserCount', 0) > 2)
                        $this->forward('auth', 'recoveryPasswordImgError');
                }
            }
        }
        $this->setTemplate('recoveryPassword');
    }

    public function executeRecoveryPasswordImgError($request)
    {
        $this->categories = Doctrine_Core::getTable('Category')->getMainPageList();

    }
}
