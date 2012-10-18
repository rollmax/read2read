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
                    'pattern' => '#R[0-9]{12}#'
                ),
                array(
                    'invalid' => 'Формат номера кошелька: Rxxxxxxxxxxxx (12 цифр после буквы R)'
                )
            )
        ));
    }
}