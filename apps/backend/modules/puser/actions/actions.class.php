<?php

require_once dirname(__FILE__) . '/../lib/puserGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/puserGeneratorHelper.class.php';

/**
 * puser actions.
 *
 * @package    read2read
 * @subpackage puser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class puserActions extends autoPuserActions
{
    public function executeIndex(sfWebRequest $request)
    {
        // sorting
        if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort'))) {
            $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
        }

        // pager
        if ($request->getParameter('page')) {
            $this->setPage($request->getParameter('page'));
        }

        $this->pager = $this->getPager();
        $this->sort = $this->getSort();

        $user = new User();

        $this->dataArray = array(
            'amountSum' => $user->getUserAmountSum('puser'),
            'sellPurchaseSum' => $user->getUserSellPurchaseSum('puser')
        );
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->user = $this->getRoute()->getObject();
        $this->balance = $this->user->getUserBalanceByPeriodId();
        $this->form = $this->configuration->getForm($this->user);
    }

}
