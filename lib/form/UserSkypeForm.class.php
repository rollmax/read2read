<?php
class UserSkypeForm extends UserForm
{
  public function  configure()
  {
    $this->useFields(array('skype'));
  }
}