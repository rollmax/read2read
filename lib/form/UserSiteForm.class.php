<?php
class UserSiteForm extends UserForm
{
    public function  configure()
    {
        $this->useFields(array('site'));

        $this->validatorSchema['site'] = new sfValidatorAnd(array(
            $this->validatorSchema['site'],
            new sfValidatorRegex(
                array(
                    'pattern' => '#\b([^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#'
                ),
                array(
                    'invalid' => 'Please Enter a Valid Url'
                )
            ),
        ), array(
            'required' => false
        ));
    }
}