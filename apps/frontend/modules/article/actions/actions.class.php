<?php

/**
 * article actions.
 *
 * @package    read2read
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends sfActions
{

    /**
     * Execute Purchase article by U_User
     *
     * @param sfWebRequets $request
     */
    public function executePurchase(sfWebRequest $request)
    {
        if (!$this->getUser()->isAuthenticated()) {
            $this->redirect('@home');
        }

        $article_id = $request->getParameter('id');
        $user = $this->getUser()->getGuardUser();
        $user->purchaseArticle($article_id);
        $oArticle = ContentTable::getInstance()->findOneById($article_id);

        if ($user->getLastPurchase() != date('Y-m-d')) {
            $user->setLastPurchase(date('Y-m-d'));
            $user->save();

            // update full statistics
            $oStatisticsFull = StatisticsTable::getInstance()
                ->getFullStatistics(Period::getCurrentPeriod()->getId());

            $oStatisticsFull->set(
                date("j") . '_buy',
                $oStatisticsFull->get(date("j") . '_buy') + 1
            );
            $oStatisticsFull->save();
        }
        // update category statistic
        $oStatisticsCat = StatisticsTable::getInstance()
            ->getFullStatistics(
            Period::getCurrentPeriod()->getId(),
            $oArticle->getCategory()->getId()
        );

        $oStatisticsCat->set(
            date("j") . '_buy',
            $oStatisticsCat->get(date("j") . '_buy') + 1
        );
        $oStatisticsCat->save();

        $oArticle->setPurchaseCnt($oArticle->getPurchaseCnt() + 1);
        $oArticle->save();

        $oCategory = $oArticle->getCategory();
        $oCategory->setPurchaseCnt($oCategory->getPurchaseCnt() + 1);
        $oCategory->save();

        $oUser = $oArticle->getUser();
        $oUser->setSells($oUser->getSells() + 1);
        $oUser->save();


        $this->redirect('@article_by_categories?id=' . $article_id . '&sburl=1');
    }

    /**
     * Show No published articles list
     *
     * @param sfWebRequest $request
     */
    public function executeNopublished(sfWebRequest $request)
    {
        $user = $this->getUser()->getGuardUser();

        $this->pager = new sfDoctrinePager(
            'Content',
            sfConfig::get('app_max_articles_on_nopublished')
        );

        $this->pager->setQuery(ContentTable::getInstance()->getNotPublishedListQuery($user->getId()));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();

    }

    /**
     * Show published articles list
     *
     * @param sfWebRequest $request
     */
    public function executePublished(sfWebRequest $request)
    {
        $user = $this->getUser()->getGuardUser();
        $this->period = Period::getCurrentPeriod();

        $this->pager = new sfDoctrinePager(
            'Content',
            sfConfig::get('app_max_articles_on_published')
        );

//        $this->pager->setQuery(ContentTable::getInstance()->getPublishedListQuery($user->getId()));

        $this->pager->setQuery(ContentTable::getSoldArticlesQuery($user, $this->period));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    /**
     * Execute Publish content (Article) action. Move article to published list
     *
     * @param sfWebRequest $request
     */
    public function executePublish(sfWebRequest $request)
    {
        $content = $this->getRoute()->getObject();
        $content->publish();

        $this->redirect('@article_no_published');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $content = $this->getRoute()->getObject();

        $redirect = '@article_no_published';
        $content->deleteContent();
        if ($content->getState() == 'public') {
            $redirect = '@article_published';
        }
        $this->redirect($redirect);
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->period = Period::getCurrentPeriod();
        $this->stats_nopub = ContentTable::getInstance()->getUserStatsNoPublished($this->getUser()->getId());
//        $this->stats_pub = ContentTable::getInstance()->getUserStatsPublished($this->getUser()->getId());
        $this->stats_pub = $this->getUser()->getGuardUser()->getSoldStatsForPeriod($this->period);
    }


    public function executeNew(sfWebRequest $request)
    {
        $this->form = new ArticleTitleForm();
    }

    /**
     * Executes create action
     *
     * @param sfRequest $request A request object
     */
    public function executeCreate(sfWebRequest $request)
    {
        $this->form = new ArticleTitleForm();
        $this->processArticleForm($request, $this->form);

        $this->setTemplate('new');
    }


    /**
     * Executes edit action
     *
     * @param sfRequest $request A request object
     */
    public function executeEdit(sfWebRequest $request)
    {
        $this->form = new ArticleEditForm($this->getRoute()->getObject());
    }


    /**
     * Executes update action
     *
     * @param sfRequest $request A request object
     */
    public function executeUpdate(sfWebRequest $request)
    {
        $this->form = new ArticleEditForm($this->getRoute()->getObject());
        $this->processArticleForm($request, $this->form);

        $this->setTemplate('edit');
    }

    /**
     * Processing form
     * @param sfWebRequest $request
     * @param sfForm $form
     */
    protected function processArticleForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName()),
            $request->getFiles($form->getName())
        );

        if ($form->isValid()) {

            $article = $form->save();

            $article->setIdUser($this->getUser()->getId());
            $article->save();

            // redirect to edit
            $this->redirect('article_edit', $article);
        }
    }


    // paragraph actions

    /**
     * Executes paragraphCreate action
     *
     * @param sfRequest $request A request object
     */

    public function createNewParagraph($id)
    {
        $paragraph = new Paragraph();
        $paragraph->setIdContent($id);
        $paragraph->save();
        if (!$paragraph->getId()) {
            // action on error
            exit;
        }

        return $paragraph;
    }

    public function executeParagraphCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $contentId = $this->getRoute()->getObject()->getId();
        $paragraph = $this->createNewParagraph($contentId);

        $this->form = new ArticleParagraphForm($paragraph);

        $this->setTemplate('paragraph');
    }


    public function executeParagraphPicCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $contentId = $this->getRoute()->getObject()->getId();
        $paragraph = $this->createNewParagraph($contentId);
        $paragraph->setIsPhoto(1);
        $paragraph->save();

        $this->form = new ArticleParagraphPicForm($paragraph);

        $this->setTemplate('paragraphPic');
    }

    /**
     * Executes paragraphUpdate action
     *
     * @param sfWebRequest $request
     */
    public function executeParagraphUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $this->form = new ArticleParagraphForm($this->getRoute()->getObject());

        $this->paragraph = $this->processParagraphForm($request, $this->form);

        if (!$this->paragraph) {
            $this->setTemplate('paragraph');
        }
    }

    public function executeParagraphPicUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $this->form = new ArticleParagraphPicForm($this->getRoute()->getObject());

        $this->paragraph = $this->processParagraphForm($request, $this->form);

        if (!$this->paragraph) {
            $this->setTemplate('paragraphPic');
        } else {
            $this->setTemplate('paragraphUpdate');
        }
    }

    /**
     * Executes paragraphDelete action
     * @param sfWebRequest $request
     */
    public function executeParagraphDelete(sfWebRequest $request)
    {
        $paragraph = $this->getRoute()->getObject();

        $this->success = (!$paragraph->getComment()->delete()) ? false : $paragraph->delete();
    }

    /**
     * Executes paragraphEdit action
     * @param sfWebRequest $request
     */
    public function executeParagraphEdit(sfWebRequest $request)
    {
        $this->form = new ArticleParagraphForm($this->getRoute()->getObject());
        $this->setTemplate('paragraph');
    }


    public function executeParagraphPicEdit(sfWebRequest $request)
    {
        $this->form = new ArticleParagraphPicForm($this->getRoute()->getObject());
        $this->setTemplate('paragraphPic');
    }

    /**
     * Processing paragraph form
     * @param sfWebRequest $request
     * @param sfForm $form
     */
    protected function processParagraphForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName()),
            $request->getFiles($form->getName())
        );

        if ($form->isValid()) {
            $paragraph = $form->save();

            if (!$paragraph->getId()) {
                return false;
            }

            if (!$paragraph->getContent()->refreshLettersCount()) {
                return false;
            }

            return $paragraph;
        }

        return false;
    }

    // author actions

    public function processAuthorForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName())
        );

        if ($form->isValid()) {
            $article = $form->save();

            return $article;
        }

        return false;
    }

    public function executeAuthorEdit(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $this->form = new ArticleEditForm($this->getRoute()->getObject());
        $this->setTemplate('author');
    }

    public function executeAuthorUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $this->form = new ArticleEditForm($this->getRoute()->getObject());
        $this->article = $this->processAuthorForm($request, $this->form);

        if (!$this->article) {
            $this->setTemplate('author');
        }
    }

    // comments actions

    /**
     * Executes commentCreate action
     *
     * @param sfRequest $request A request object
     */
    public function executeCommentCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $paragraphId = $this->getRoute()->getObject()->getId();
        $comment = new Comment();
        $comment->setIdParagraph($paragraphId);
        $comment->save();
        if (!$comment->getId()) {
            // action on error
            exit;
        }
        $this->form = new ArticleCommentForm($comment);

        $this->setTemplate('comment');
    }


    /**
     * Executes commentUpdate action
     *
     * @param sfWebRequest $request
     */
    public function executeCommentUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $this->form = new ArticleCommentForm($this->getRoute()->getObject());

        $this->comment = $this->processCommentForm($request, $this->form);
        if (!$this->comment) {
            $this->setTemplate('comment');
        }
    }

    /**
     * Executes commentDelete action
     * @param sfWebRequest $request
     */
    public function executeCommentDelete(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $comment = $this->getRoute()->getObject();

        $this->success = $comment->delete();
    }

    /**
     * Executes commentEdit action
     * @param sfWebRequest $request
     */
    public function executeCommentEdit(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $this->form = new ArticleCommentForm($this->getRoute()->getObject());
        $this->setTemplate('comment');
    }

    protected function processCommentForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName())
        );

        if ($form->isValid()) {
            $comment = $form->save();

            if (!$comment->getId()) {
                return false;
            }

            return $comment;
        }

        return false;
    }

}
