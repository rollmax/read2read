<?php

/**
 * BalanceSystem form base class.
 *
 * @method BalanceSystem getObject() Returns the current form's model object
 *
 * @package    read2read
 * @subpackage form
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBalanceSystemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'id_period'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'add_empty' => true)),
      'deposit_standart'    => new sfWidgetFormInputText(),
      'deposit_expert'      => new sfWidgetFormInputText(),
      'deposit_super'       => new sfWidgetFormInputText(),
      'deposit_user'        => new sfWidgetFormInputText(),
      'charges_standart'    => new sfWidgetFormInputText(),
      'charges_expert'      => new sfWidgetFormInputText(),
      'charges_super'       => new sfWidgetFormInputText(),
      'charges_user'        => new sfWidgetFormInputText(),
      'in_balance_standart' => new sfWidgetFormInputText(),
      'in_balance_super'    => new sfWidgetFormInputText(),
      'in_balance_expert'   => new sfWidgetFormInputText(),
      'in_balance_user'     => new sfWidgetFormInputText(),
      'sales_standart'      => new sfWidgetFormInputText(),
      'sales_super'         => new sfWidgetFormInputText(),
      'sales_expert'        => new sfWidgetFormInputText(),
      'to_pay_standart'     => new sfWidgetFormInputText(),
      'to_pay_super'        => new sfWidgetFormInputText(),
      'to_pay_expert'       => new sfWidgetFormInputText(),
      'r2r_standart'        => new sfWidgetFormInputText(),
      'r2r_super'           => new sfWidgetFormInputText(),
      'r2r_expert'          => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_period'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'required' => false)),
      'deposit_standart'    => new sfValidatorNumber(),
      'deposit_expert'      => new sfValidatorNumber(),
      'deposit_super'       => new sfValidatorNumber(),
      'deposit_user'        => new sfValidatorNumber(),
      'charges_standart'    => new sfValidatorNumber(),
      'charges_expert'      => new sfValidatorNumber(),
      'charges_super'       => new sfValidatorNumber(),
      'charges_user'        => new sfValidatorNumber(),
      'in_balance_standart' => new sfValidatorNumber(),
      'in_balance_super'    => new sfValidatorNumber(),
      'in_balance_expert'   => new sfValidatorNumber(),
      'in_balance_user'     => new sfValidatorNumber(),
      'sales_standart'      => new sfValidatorInteger(),
      'sales_super'         => new sfValidatorInteger(),
      'sales_expert'        => new sfValidatorInteger(),
      'to_pay_standart'     => new sfValidatorNumber(),
      'to_pay_super'        => new sfValidatorNumber(),
      'to_pay_expert'       => new sfValidatorNumber(),
      'r2r_standart'        => new sfValidatorNumber(),
      'r2r_super'           => new sfValidatorNumber(),
      'r2r_expert'          => new sfValidatorNumber(),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('balance_system[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BalanceSystem';
  }

}
