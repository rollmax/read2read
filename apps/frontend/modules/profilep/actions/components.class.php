<?php
class profilepComponents extends sfComponents
{
  /**
   * Account state
   *
   * @param sfWebRequest $request
   */
  public function executeAccountState(sfWebRequest $request)
  {
    $this->user = $this->getUser()->getGuardUser();
    $this->settings = Doctrine::getTable('Setting')->getSettings();
  }

}