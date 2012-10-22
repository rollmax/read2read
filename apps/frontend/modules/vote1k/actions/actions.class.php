<?php

/**
 * vote1k actions.
 *
 * @package    read2read
 * @subpackage vote1k
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vote1kActions extends sfActions
{
    public function preExecute()
    {
        if (!$this->getUser()->getGuardUser()->isEnableVote1k()) {
            $this->redirect('profile_p_user');
        }
    }

    public function executeVotemy(sfWebRequest $request)
    {
        $this->vote = $this->getUser()->getGuardUser()->hasVote()->getFirst();
    }

    /**
     * Show All votes list
     *
     * @param sfWebRequest $request
     */
    public function executeVotes(sfWebRequest $request)
    {
        $this->period = Period::getCurrentPeriod();
        $this->user = $this->getUser()->getGuardUser();
        $this->voted = $this->user->isVoted();
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->period = Period::getCurrentPeriod();
        $this->user = $this->getUSer()->getGuardUser();
        $this->form = new UserVoteForm();

        if ($this->user->isVoted()) {
            $this->redirect('profile_p_vote1k_all');
        }

        if ($request->getParameter('create-vote') != '') {
            if ($this->user->hasVote()->count() == 0) {
                if ($this->processForm($request, $this->form)) {
                    $vote = $this->form->save();
                    $vote->setUser($this->user);
                    $vote->setPeriod($this->period);
                    $vote->setWeight($this->user->getWeight());
                    $vote->save();
                    VoteTable::getInstance()->setPositions();
                }
            }
        }
    }

    /**
     * Executes addVote action
     *
     * @param sfWebRequest $request
     */
    public function executeAddVote(sfWebRequest $request)
    {
        $user = $this->getUser()->getGuardUser();

        if ($user->isVoted() || $user->hasVote()->count() != 0) {
            $this->redirect('profile_p_vote1k_all');
        }

        $vote = $this->getRoute()->getObject();
        $vote->setWeight($user->getWeight() + $vote->getWeight());
        $vote->setJoins($vote->getJoins() + 1);
        $vote->save();

        $voter = new Voters();
        $voter->setUser($user);
        $voter->setVote($vote);
        $voter->save();

        VoteTable::getInstance()->setPositions();

        $this->redirect('profile_p_vote1k_all');
    }

    /**
     * Process form method
     *
     * @param sfWebREquest $request
     * @param sfForm $form
     * @return <boolean>
     */
    protected function processForm(sfWebREquest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()));

        if ($form->isValid()) {
            return true;
        }

        return false;
    }
}
