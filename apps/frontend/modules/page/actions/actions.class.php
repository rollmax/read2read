<?php

/**
 * page actions.
 *
 * @package    read2read
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
{

  public function preExecute()
  {
    if($this->getUser()->isAuthenticated())
    {
      $this->getUser()->signOut();
    }
  }
  
  public function executeContact()
  {
      // Get contact page content
      $this->page = PageTable::getContactPage();
  }


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
  * Executes showPage action
  *
  * @param sfRequest $request A request object
  */
  public function executeShowPage(sfWebRequest $request)
  {
    $this->page = $this->getRoute()->getObject();

    if($this->page->getSubPage()->getFirst())
      $this->redirect('static_page_subpage', $this->page->getSubPage()->getFirst());
  }
  
 /**
  * Executes showSubPage action
  *
  * @param sfRequest $request A request object
  */
  public function executeShowSubPage(sfWebRequest $request)
  {
    $this->page = $this->getRoute()->getObject();
  }
}
