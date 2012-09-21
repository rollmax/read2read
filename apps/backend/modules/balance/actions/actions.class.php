<?php

require_once dirname(__FILE__).'/../lib/balanceGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/balanceGeneratorHelper.class.php';

/**
 * balance actions.
 *
 * @package    read2read
 * @subpackage balance
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class balanceActions extends autoBalanceActions
{
    /**
     * Execute show P_Users payment page
     *
     * @param sfWebRequest $request
     */
    public function executePpayment(sfWebRequest $request)
    {
        $this->sysBalance = BalanceSystem::getCurrentBalanceInstance();
        $this->p_users = UserTable::getInstance()->retrieveBackendPuserList()->execute();
    }


    public function executeIndex(sfWebRequest $request)
    {
        // System balance
        $this->sysBalance = BalanceSystem::getCurrentBalanceInstance();

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
    }

}
