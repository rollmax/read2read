<?php
class UserLivePlaceForm extends UserForm
{
  public function  configure()
  {
    $this->useFields(array('live_place'));
  }
}