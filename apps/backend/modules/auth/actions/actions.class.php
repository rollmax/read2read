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
   * Execute Login action
   *
   * @param sfWebRequest $request A request object
   */
  public function executeLogin(sfWebRequest $request)
  {
    $user = $this->getUser();
    if ($user->isAuthenticated())
    {
      return $this->redirect('@homepage');
    }

    $this->form = new LoginForm();
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $values = $this->form->getValues(); 
        $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

        $signinUrl = $user->getReferer($request->getReferer());
        
        return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
      }
    }
    else
    {
      $user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

      if ($this->getModuleName() != 'auth')
      {
        return $this->redirect('@login');
      }

      $this->getResponse()->setStatusCode(401);
    }
  }
  
 /**
  * Executes logout action
  *
  * @param sfRequest $request A request object
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
}
