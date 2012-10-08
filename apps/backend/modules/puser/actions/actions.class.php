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
            'amountSum' => $user->getUserAmountSum('puser', Period::getCurrentPeriod()->getId()),
            'sellPurchaseSum' => $user->getUserSellPurchaseSum('puser', Period::getCurrentPeriod()->getId())
        );
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->user = $this->getRoute()->getObject();
        $this->balance = $this->user->getUserBalanceByPeriodId();
        $this->form = $this->configuration->getForm($this->user);
    }

    public function executeBatchDelete(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $records = Doctrine_Query::create()
            ->from('User')
            ->whereIn('id', $ids)
            ->execute();

        $err = false;
        foreach ($records as $record) {
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));

            if (!$record->delete()) {
                $err = true;
            }
        }

        if ($err) {
            $this->getUser()->setFlash('error', 'Некоторые пользователи не удалены т.к. по ним имеются невыплаченные суммы.');
        } else {
            $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
        }
        $this->redirect('@user_puser');
    }
}
