<?php
class UserBalanceForm extends UserForm
{
    public function  configure()
    {
        $this->widgetSchema['balance_add'] = new sfWidgetFormInputText();
        $this->validatorSchema['balance_add'] = new sfValidatorNumber(array(
            'min' => 0
        ));


        $this->useFields(array('balance_add'));
    }
}