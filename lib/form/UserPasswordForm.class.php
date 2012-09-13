<?php

class UserPasswordForm extends UserForm
{
  public function  configure()
  {
    $this->widgetSchema['password_confirm'] = new sfWidgetFormInputPassword();
    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
    $this->useFields(array('password', 'password_confirm'));
    $this->widgetSchema->setLabels(array(
      'password'=>'новый пароль',
      'password_confirm'=>'подтвердите новый пароль',

    ));

    $this->validatorSchema['password_confirm'] = clone $this->validatorSchema['password'];
    $this->validatorSchema['password']->setOption('required', true);

    $this->mergePostValidator(new sfValidatorSchemaCompare('password',
                                  sfValidatorSchemaCompare::EQUAL, 'password_confirm',
                                  array(),
                                  array('invalid' => 'Пароли должны совпадать')));
  }
}