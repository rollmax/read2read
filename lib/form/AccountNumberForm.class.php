<?php
class AccountNumberForm extends UserForm
{
  public function configure()
  {
    $this->useFields(array('account_number'));
    $this->validatorSchema['account_number'] = new sfValidatorAnd(array(
      $this->validatorSchema['account_number'],
      new sfValidatorRegex(
        array(
          'pattern' => '#[a-z0-9+-\s"()"]#'
        ),
        array(
          'invalid' => 'Вы можете ввести только буквенно-численное значение'
        )
      )
    ));
  }
}