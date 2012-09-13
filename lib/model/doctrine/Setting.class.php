<?php

/**
 * Setting
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    read2read
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Setting extends BaseSetting
{
  public function getPriceByTariff($tariff)
  {
    $price = 0;
    if(!key_exists($tariff, User::$tariffs)) return $price;

    if($tariff == 'expert') $price = $this->getPriceExpert();
    elseif ($tariff == 'super') $price = $this->getPriceSuper();
    else $price = $this->getPriceStandart();
    
    return $price;
  }

  /**
   * Returns price for the expert account
   * @return <decimal> price 
   */
  public function getPriceExpert()
  {
    $option = SettingTable::getInstance()->getOptionByName('expert');
    return $option->getValue();
  }

  /**
   * Returns price for the standart account
   * @return <decimal> price
   */
  public function getPriceStandart()
  {
    $option = SettingTable::getInstance()->getOptionByName('standart');
    return $option->getValue();
  }

  /**
   * Returns price for the super account
   * @return <decimal> price
   */
  public function getPriceSuper()
  {
    $option = SettingTable::getInstance()->getOptionByName('super');
    return $option->getValue();
  }

  /**
   * Returns price for the 1k symbols
   * @return <decimal> price
   */
  public function getPrice1k()
  {
    $curentPeriod = Period::getCurrentPeriod();
    return $curentPeriod->get1k();
  }
  
  /**
   * Return R2R percent
   *
   * @return int
   */
  public static function getR2RPercent()
  {
    $option = SettingTable::getOptionByName('percent_r2r');
    return (int) $option->getValue();
  }

    public static function getValueByName($name)
    {
        $out = SettingTable::getOptionByName($name);
        return $out->getValue();
    }
}