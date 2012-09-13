<?php
class authComponents extends sfComponents
{
  /**
   * Execute Login Form action
   *
   * @param sfWebRequest $request
   */
  public function executeLoginForm(sfWebRequest $request)
  {
    $this->form = new LoginForm();
    if ($request->isMethod('post') && null !== $request->getParameter($this->form->getName()) )
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $values = $this->form->getValues();
        $this->getUser()->signin($values['user'], true);
        $oUser = $this->getUser()->getGuardUser();

        if($oUser->getLastLogin() != date("Y-m-d") && $oUser->getUtype() == 'uuser')
        { // statistic writing
          // set last login
          $oUser->setLastLogin(date("Y-m-d"));
          $oUser->save();

          // get current statistic raw
          $oStatistics = StatisticsTable::getInstance()
                          ->getFullStatistics(Period::getCurrentPeriod()->getId());

          // update login statistic
          $oStatistics->set(date("j").'_login', $oStatistics->get(date("j").'_login')+1);
          $oStatistics->save();
        }
        

        return $this->getController()->redirect('@homepage');
      }
    }
  }

  /**
   * Execute User Menu
   *
   * @param sfWebRequest $request
   */
  public function executeUserMenu(sfWebRequest $request)
  {
    
  }

}
