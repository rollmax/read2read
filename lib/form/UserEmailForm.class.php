<?php

class UserEmailForm extends UserForm
{
  public function  configure()
  {
    $this->useFields(array('email'));

   $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail()
    ));
  }

  
  
}