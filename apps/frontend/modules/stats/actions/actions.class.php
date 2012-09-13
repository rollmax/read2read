<?php
/**
 * stats actions.
 *
 * @package    read2read
 * @subpackage stats
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statsActions extends sfActions
{
  
  public function preExecute()
  {
    if( !$this->getUser()->getGuardUser()->isEnableStatics() )
      $this->redirect('profile_p_user');
      
    $this->period = Period::getCurrentPeriod();
  }
  
  public function executeInterpreter(sfWebRequest $request)
  {
    if( $this->getUser()->getGuardUser()->getTariff() != 'super' )
      $this->redirect('profile_p_user');
      
    $this->form = new CategorySelectForm();
    $iCategoryId = 1;

    if($request->getParameter('category', false))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      $iCategoryId = $this->form->getValue('id_category');
      $this->form->setDefault('id_category', $iCategoryId);
    }

    $stats = new StatsClass();
    $this->top = $stats->getTopAuthors($this->period);
    $this->top2 = $stats->getTopAuthors($this->period, $iCategoryId);
  }
  
  /**
   * Show Visit stats
   *
   * @param sfWebRequest $request
   */
  public function executeVisit(sfWebRequest $request)
  {
    $this->form = new CategorySelectForm();
    $iCategoryId = 1;
    $iPeriodId = Period::getCurrentPeriod()->getId();

    if($request->getParameter('category', false))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      $iCategoryId = $this->form->getValue('id_category');
      $this->form->setDefault('id_category', $iCategoryId);
    }


    $this->aFullData = StatisticsTable::getInstance()->getFullStatistics($iPeriodId);

    $this->aDataByCategory = StatisticsTable::getInstance()
                              ->getFullStatistics($iPeriodId, $iCategoryId);

  }
  
  /**
   * Show Quality stats
   *
   * @param sfWebRequest $request
   */
  public function executeQuality(sfWebRequest $request)
  {
    $stats = new StatsClass();
    $this->top = $stats->getTopReadersArticles($this->period);
    $this->top_r2r = $stats->getTopR2RArticles($this->period);
  }
  
  /**
   * Show Size stats
   *
   * @param sfWebRequest $request
   */
  public function executeSize(sfWebRequest $request)
  {
    $stats = new StatsClass();
    $this->top = $stats->getTopSizeArticles($this->period);
    $this->worse = $stats->getWorseSizeArticles($this->period);
  }
  
 /**
  * Show sales stats
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $stats = new StatsClass();
    // Top articles
    $this->articles = $stats->getTopSalesArticles($this->period);
    //
    $this->categories = $stats->getTopSalesCategories($this->period);
  }

}
