<?php

/**
 * resume actions.
 *
 * @package    read2read
 * @subpackage resume
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class resumeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  

  /**
   * Executes resumeData action
   *
   * @param sfWebRequest $request
   */
  public function executeResumeData(sfWebRequest $request)
  {
//    $this->forward404Unless($request->isXmlHttpRequest());

    $this->user = $this->getRoute()->getObject();
  }

  /**
   * Executes resumeTranslates action
   *
   * @param sfWebRequest $request
   */
  public function executeResumeTranslates(sfWebRequest $request)
  {
    $user = $this->getRoute()->getObject();
    // getting translates
    $this->translates = $user->getContent();
  }

  public function executeArticle(sfWebRequest $request)
  {
    $this->article = $this->getRoute()->getObject();
    $this->forward404Unless($this->article);

    $this->account_blocked = false;
    $this->show_full = false;
    $this->has_money = false;
    $this->is_u_user = false;
    $this->back_url = '';

    if($this->getUser()->isAuthenticated())
    {
      if($this->getUser()->getGuardUser()->getUtype() == 'uuser') $this->is_u_user = true;
      $this->account_blocked = $this->getUser()->getGuardUser()->getIsBlocked();

      if( $this->getUser()->getGuardUser()->isPurchaseArticle($this->article->getId()) )
      $this->show_full = true;

      // Have user enough money ?
      if($this->getUser()->getGuardUser()->getBalans() >= $this->article->getPrice())
      $this->has_money = true;
      
    }
  }
}
