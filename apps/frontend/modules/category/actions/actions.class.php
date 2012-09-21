<?php

/**
 * category actions.
 *
 * @package    read2read
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends sfActions
{

    public function executePrint()
    {
        if (!$this->getUser()->isAuthenticated()) {
            $this->redirect($this->generateUrl('homepage'));
        }
        $this->article = $this->getRoute()->getObject();
        if (!$this->getUser()->getGuardUser()->isPurchaseArticle($this->article->getId())) {
            $this->redirect($this->generateUrl('homepage'));
        }
        $this->getResponse()->setTitle('Read to read - ' . $this->article->getCategory()->getNameEn());
    }

    public function executeIndex(sfWebRequest $request)
    {
        $this->categories = Doctrine_Core::getTable('Category')->getMainPageList();
    }


    public function executeShow(sfWebRequest $request)
    {
        $this->categories = Doctrine_Core::getTable('Category')->getMainPageList();

        $this->currentCategory = $this->getRoute()->getObject();

        $this->forward404Unless($this->getRoute()->getObject()->getCategoryArticlesList());

        $u_user_id = 0;
        if ($this->getUser()->isAuthenticated()) {
            if ($this->getUser()->getGuardUser()->getUtype() == 'uuser') {
                $u_user_id = $this->getUser()->getGuardUser()->getId();
                // Update stats
                StatsClass::uuserViewCategory($u_user_id, $this->currentCategory->getId());
            }
        }

        $this->pager = new sfDoctrinePager('Category', sfConfig::get('app_category_max_articles'));
        $this->pager->setQuery($this->getRoute()->getObject()->getCategoryArticlesListQuery($u_user_id));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShowArticle(sfWebRequest $request)
    {
        $this->article = $this->getRoute()->getObject();
        $this->forward404Unless($this->article);

        $this->account_blocked = false;
        $this->show_full = false;
        $this->has_money = false;
        $this->is_u_user = false;
        $this->back_url = '';

        if ($this->getUser()->isAuthenticated()) {
            if ($this->getUser()->getGuardUser()->getUtype() == 'uuser') {
                $this->is_u_user = true;
            }
            $this->account_blocked = $this->getUser()->getGuardUser()->getIsBlocked();

            if ($this->getUser()->getGuardUser()->isPurchaseArticle($this->article->getId())) {
                $this->show_full = true;
            }

            // Have user enough money ?
            if ($this->getUser()->getGuardUser()->getBalans() >= $this->article->getPrice()) {
                $this->has_money = true;
            }

            $set_back_url = true;
            $skip_back_url = $request->getParameter('sburl', '');
            if ($skip_back_url == '1') {
                $set_back_url = false;
            }
            $this->back_url = ($set_back_url) ? $request->getReferer() : '';
        }
    }

    /**
     * Executes rate action
     *
     * @param sfWebRequest $request
     */
    public function executeRate(sfWebRequest $request)
    {
        if ($request->isXmlHttpRequest()) {
            $result = array("success" => 0);

            $iArticleId = $request->getParameter('article_id');
            $sRateType = $request->getParameter('rate_type');
            $iRating = (int)$request->getParameter('rating');

            // checking input data
            $this->forward404Unless(
                (
                    ($iRating >= 1 && $iRating <= 5) ||
                        ($sRateType == 'content' || $sRateType != 'translate' || $sRateType == 'r2rcontent' || $sRateType != 'r2rtranslate')
                )
            );

            $this->forward404Unless($oArticle = ContentTable::getInstance()->findOneById($iArticleId));

            // updating rating
            if ($sRateType == 'content') {
                $oArticle->setUserContentRating($this->getUser()->getGuardUser()->getId(), $iRating);
                $result['success'] = 1;
                echo json_encode($result);
                exit;
            }

            if ($sRateType == 'translate') {
                $oArticle->setUserTranslateRating($this->getUser()->getGuardUser()->getId(), $iRating);
                $result['success'] = 1;
                echo json_encode($result);
                exit;
            }

            if ($sRateType == 'r2rcontent') {
                $oArticle->setR2rContRate($iRating);
                $oArticle->save();
                $result['success'] = 1;
                echo json_encode($result);
                exit;
            }

            if ($sRateType == 'r2rtranslate') {
                $oArticle->setR2rTransRate($iRating);
                $oArticle->save();
                $result['success'] = 1;
                echo json_encode($result);
                exit;
            }
        } else {
            $this->redirect($request->getReferer());
        }

    }

}
