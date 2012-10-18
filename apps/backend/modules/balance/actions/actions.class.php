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
        $this->paid = 0;

        $this->form = new ProcessMPForm();
        $this->sysBalance = BalanceSystem::getCurrentBalanceInstance();
        $this->p_users = UserTable::getInstance()->retrieveBackendPuserList()->execute();
    }


    public function executeIndex(sfWebRequest $request)
    {
        // System balance
        $this->sysBalance = BalanceSystem::getCurrentBalanceInstance();
        $this->balanceUser = BalanceUserTable::getInstance();

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

    public function executeGenerateMP()
    {
        $content = BalanceSystem::genMassPayWM();

        if (strlen($content) > 0) {
            $this->setLayout(false);
            sfConfig::set('sf_web_debug', false);

            $fname = strftime('%Y-%m-%d_%H:%M', time()) . '_mass_payment.csv';

            $this->getResponse()->clearHttpHeaders();
            $this->getResponse()->setContentType('application/octet-stream', true);
            $this->getResponse()->setHttpHeader('Content-Transfer-Encoding', 'binary', true);
            $this->getResponse()->setHttpHeader('Content-Disposition','attachment; filename=' . $fname, TRUE);
            $this->getResponse()->sendHttpHeaders();
            $this->getResponse()->setContent($content);

            return sfView::NONE;
        } else {
            $this->getUser()->setFlash('error', 'Отсутствуют суммы для выплаты, либо неверные номера кошельков у пользователей.');
            $this->redirect('@payment_pusers');
        }
    }

    public function executeProcessMP(sfWebRequest $request)
    {
        $this->executePpayment($request);

        $this->form->bind(
            $request->getPostParameters(),
            $request->getFiles()
        );

        if ($this->form->isValid()) {
            $mpfile = file($this->form->getValue('mpfile')->getTempName());
            $this->paid = BalanceSystem::ProcessMP($mpfile);
            $this->getUser()->setFlash('notice', 'Файл с выпиской обработан');
        }

        $this->setTemplate('ppayment');
    }
}
