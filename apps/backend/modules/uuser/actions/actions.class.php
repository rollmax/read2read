<?php

require_once dirname(__FILE__).'/../lib/uuserGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/uuserGeneratorHelper.class.php';

/**
 * uuser actions.
 *
 * @package    read2read
 * @subpackage uuser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class uuserActions extends autoUuserActions
{
  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $user = new User();

    $this->dataArray = array(
      'amountSum'       => $user->getUserAmountSum('uuser'),
      'sellPurchaseSum' => $user->getUserSellPurchaseSum('uuser')
    );
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->user = $this->getRoute()->getObject();
//    $this->form = $this->configuration->getForm($this->user);
  }
  
}
