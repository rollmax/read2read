<?php

class UserTariffForm extends UserForm
{
  public function configure()
  {
    $this->useFields(array('tariff_change'));

    $this->widgetSchema['tariff_change'] = new sfWidgetFormSelectRadio(array('choices' => User::$tariffs));
  }
}