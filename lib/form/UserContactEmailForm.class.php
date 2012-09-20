<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aleksxor
 * Date: 20.09.12
 * Time: 14:50
 */


class UserContactEmailForm extends UserForm
{
    public function configure()
    {
        $this->useFields(array('contact_email'));

        $this->validatorSchema['contact_email'] = new sfValidatorAnd(array(
            $this->validatorSchema['contact_email'],
            new sfValidatorEmail()
        ));
    }
}
