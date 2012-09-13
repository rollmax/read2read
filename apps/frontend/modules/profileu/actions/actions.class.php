<?php

/**
 * profileu actions.
 *
 * @package    read2read
 * @subpackage profileu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileuActions extends sfActions
{

  /**
   * Execute Change Password (with Image) action
   *
   * @param sfWebRequest $request
   */
  public function executePwschange(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getGuardUser();
    $this->form = new UserPasswordImgForm($this->getUser()->getGuardUser());

    if(!$this->processPswChangeForm($request, $this->form)) {
      $this->redirect('profile_u_psw_change_err');
      return;
    }
    $this->redirect('profile_u_psw_change_ok');
  }
  
  public function executePwschangeok(sfWebRequest $request)
  {
    if($request->getMethod() == 'POST') {
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
      $log->logEvent('Read2Read - Изменение пароля',
            <<<EOF
Уведомление для админа.
Аккаунт [{$user->getLogin()}] на сайте read2read.ru сменил пароль.
EOF
        );

        $this->getUser()->signOut();
      $this->redirect('@homepage');
    }
  }
  
  public function executePwschangeerror()
  {
  }
  
  protected function processPswChangeForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind(
      $request->getParameter($form->getName()),
      $request->getFiles($form->getName())
    );
      
    if ($form->isValid())
    {
      // Save TMP image and check
      $form->getValue('img_file_name')->save();
      $rezult = $this->user->checkSequereImg($form->getValue('img_file_name')->getSavedName());
      @unlink($form->getValue('img_file_name')->getSavedName());
      return $rezult;
    }
    if(!is_object($form->getValue('img_file_name'))) {
      return false;
    }
    if($form->getValue('img_file_name')->getSavedName()!='') {
      @unlink($form->getValue('img_file_name')->getSavedName());
    }
    return false;
  }
  
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getGuardUser();
  }
  
 /**
  * Executes upic action
  *
  * @param sfRequest $request A request object
  */
  public function executeUpic(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getGuardUser();
  }

  /**
  * Executes UpicAjaxEdit action
  *
  * @param sfRequest $request A request object
  */
  public function executeAjaxEdit(sfWebRequest $request)
  {
    $this->forward404Unless($request->isXmlHttpRequest());

    $params = $this->getRoute()->getParameters();
    switch( $params['type'])
    {
      case 'userpic':
        $this->form = new UserUserpicForm($this->getUser()->getGuardUser());
        $this->fieldName  = 'userpic';
        $this->cssId      = 'userpic';
        $this->type       = 'userpic';
        $this->setTemplate('ajaxEdit/inputFile');
        break;
      case 'constMsg':
        $this->form = new UserConstMsgForm($this->getUser()->getGuardUser());
        $this->fieldName  = 'const_msg';
        $this->cssId      = 'const-msg';
        $this->type       = 'constMsg';
        $this->setTemplate('ajaxEdit/inputText');
        break;
      case 'email':
        $this->form = new UserEmailForm($this->getUser()->getGuardUser());
        $this->fieldName  = 'email';
        $this->cssId      = 'email';
        $this->type       = 'email';
        $this->titleName  = 'e-mail';
        $this->setTemplate('ajaxEdit/inputTextThreeCol');
        break;
      case 'password':
        $this->form = new UserPasswordImgForm($this->getUser()->getGuardUser());
        $this->setTemplate('ajaxEdit/inputPasswordImg');
        break;
      case 'balance':
        $this->form = new UserBalanceForm($this->getUser()->getGuardUser());
        $this->fieldName  = 'balance_add';
        $this->cssId      = 'balance';
        $this->type       = 'balance';
        $this->titleName  = 'Сумма на счету';
        $this->setTemplate('ajaxEdit/inputTextThreeCol');
    }
  }

  /**
  * Executes UpicAjaxEdit action
  *
  * @param sfRequest $request A request object
  */
  public function executeAjaxUpdate(sfWebRequest $request)
  {
    $params = $this->getRoute()->getParameters();
    $this->user = $this->getUser()->getGuardUser();
    
    switch( $params['type'])
    {
      case 'userpic':
        $this->form = new UserUserpicForm($this->getUser()->getGuardUser());
        
        break;
      case 'constMsg':
        $this->form = new UserConstMsgForm($this->getUser()->getGuardUser());
        break;
      case 'email':
        $this->form = new UserEmailForm($this->getUser()->getGuardUser());
        break;
      case 'password':
        $this->form = new UserPasswordForm($this->getUser()->getGuardUser());
        break;
      case 'balance':
        $this->form = new UserBalanceForm($this->getUser()->getGuardUser());
    }
    if(false === $this->processForm($request, $this->form))
    {
      switch ($params['type'])
      {
        case 'userpic':
          $this->setTemplate('upic');
          break;
        case 'constMsg':
          $this->fieldName  = 'const_msg';
          $this->cssId      = 'const-msg';
          $this->type       = 'constMsg';
          $this->setTemplate('ajaxEdit/inputText');
          break;
        case 'email':
          $this->fieldName  = 'email';
          $this->cssId      = 'email';
          $this->titleName  = 'e-mail';
          $this->type       = 'email';
          $this->setTemplate('ajaxEdit/inputTextThreeCol');
          break;
        case 'password':
          $this->setTemplate('ajaxEdit/inputPassword');
        break;
        case 'balance':
          $this->fieldName  = 'balance_add';
          $this->cssId      = 'balance';
          $this->titleName  = 'Сумма на счету';
          $this->type       = 'balance';
          $this->setTemplate('ajaxEdit/inputTextThreeCol');
        break;
      }
    }
    else
    {
      switch ($params['type'])
      {
        case 'userpic':
          $this->setTemplate('upic');
          break;
        case 'constMsg':
          $this->value  = $this->user->getConstMsgUserPanel();
          $this->type   = 'constMsg';
          $this->cssId  = 'const-msg';
          $this->setTemplate('ajaxUpdate/inputText');
          break;
        case 'email':
          $this->value      = $this->user->getEmail();
          $this->cssId      = 'email';
          $this->titleName  = 'e-mail';
          $this->type       = 'email';
          $this->setTemplate('ajaxUpdate/inputTextThreeCol');
          break;
        case 'password':
          $this->getUser()->signOut();
          $this->setTemplate('ajaxUpdate/inputPassword');
          break;
        case 'balance':
          echo json_encode(array('redirect' => $this->generateUrl('profile_u_account')));
          exit;
//          $this->value      = $this->user->getBalans();
//          $this->cssId      = 'balance';
//          $this->titleName  = 'Сумма на счету';
//          $this->type       = 'balance';
//          $this->btnText    = 'Пополнить счет';
//          $this->setTemplate('ajaxUpdate/inputTextThreeCol');
        break;
      }
    }
    
  }
  

 /**
  * Executes purchase action
  *
  * @param sfRequest $request A request object
  */
  public function executePurchase(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getGuardUser();
    $this->contentPurchaseCategories = $this->user->getPurchaseCategories();
    $this->categoryId = ($this->getRequestParameter('category', false)) ? $this->getRequestParameter('category') : (($this->contentPurchaseCategories->count() > 0) ? $this->contentPurchaseCategories->getFirst()->getCategory()->getId() : 0);

    $this->pager = new sfDoctrinePager(
      'ContentPurchase',
      sfConfig::get('app_max_articles_on_u_purchase')
    );

    $this->pager->setQuery(ContentPurchaseTable::getInstance()->getUserPurchaseByCategoryQuery($this->user->getId(), $this->categoryId));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Executes purchase delete action
   * @param sfWebRequest $request
   */
  public function executePurchaseRemove(sfWebRequest $request)
  {
    $this->forward404Unless($purchase = $this->getRoute()->getObject());
    $categoryId = $purchase->getIdCategory();
    $purchase->delete();
    
    if(ContentPurchaseTable::getInstance()->getUserPurchaseByCategoryQuery($this->getUser()->getId(), $categoryId)->count() == 0)
      $this->redirect('profile_u_purchase');
    else
      $this->redirect($request->getReferer());
  }

 /**
  * Executes account action
  *
  * @param sfRequest $request A request object
  */
  public function executeAccount(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getGuardUser();
  }

  /**
   * Processing Forms
   * @param sfWebRequest $request
   * @param sfForm $form
   * @return <boolean>
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind(
      $request->getParameter($form->getName()),
      $request->getFiles($form->getName())
    );

    if ($form->isValid())
    {
      if(isset($form['balance_add']))
      {
        $user = $this->getUser()->getGuardUser();
        $user->addFunds($form->getValue('balance_add'));
        return true;
      }
      $user = $form->save();

      return true;
    }
    return false;
  }
}
