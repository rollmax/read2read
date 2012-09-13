<?php
class LoginForm extends sfForm
{
  
  function configure()
  {
    $this->widgetSchema['login'] = new sfWidgetFormInputText();
    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
    
    $this->validatorSchema['login'] =
        new sfValidatorString(array('required' => true,),
                              array('required' => 'Введите логин',
                                    'invalid' => 'Такой логин не существует'
                              )
                             );

    $this->validatorSchema['password'] =
        new sfValidatorString(array('required' => true,),
                              array('required' => 'Введите пароль',
                                    'invalid' => 'Пароль введен неверно'
                              )
                             );

    $this->validatorSchema->setPostValidator(new validatorLogin());
    
    $this->widgetSchema->setNameFormat('login[%s]');
  }
  
}