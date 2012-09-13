<?php
class UserSiteForm extends UserForm
{
  public function  configure()
  {
    $this->useFields(array('site'));
    
    $this->validatorSchema['site'] = new sfValidatorAnd(array(
      $this->validatorSchema['site'],
      new sfValidatorUrl(),
    ));
  }
}