<?php
class UserLastNameForm extends UserForm
{
  public function  configure()
  {
    $this->useFields(array('last_name'));
  }
}