<?php
class UserFirstNameForm extends UserForm
{
  public function  configure()
  {
    $this->useFields(array('first_name'));
  }
}