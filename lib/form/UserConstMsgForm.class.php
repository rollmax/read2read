<?php
class UserConstMsgForm extends UserForm
{
  public function  configure()
  {
    $this->useFields(array('const_msg'));
  }
}