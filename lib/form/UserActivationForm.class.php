<?php

class UserActivationForm extends BaseForm
{
  public function  configure()
  {
    $this->widgetSchema['login_check'] = new sfWidgetFormInputText();

    $this->validatorSchema['login_check'] = new sfValidatorString(array('max_length' => 100));

    $this->widgetSchema->setNameFormat('activate[%s]');
  }
}