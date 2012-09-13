<?php

class BackendSettingForm extends SettingForm
{
  public function configure()
  {
    $this->useFields(array('value'));
  }
}