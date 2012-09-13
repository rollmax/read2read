<?php
class UserPhoneForm extends UserForm
{
  public function  configure()
  {
    $this->useFields(array('phone'));

    $this->validatorSchema['phone'] = new sfValidatorAnd(array(
      $this->validatorSchema['phone'],
      new sfValidatorRegex(
        array(
          'pattern' => '#[a-z0-9+-\s"()"]#'
        ),
        array(
          'invalid' => 'Please Enter a Valid Phone Number (xxx-xxx-xxxx)'
        )
      )
    ));
  }
}