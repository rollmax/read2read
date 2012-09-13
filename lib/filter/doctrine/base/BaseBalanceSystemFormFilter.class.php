<?php

/**
 * BalanceSystem filter form base class.
 *
 * @package    read2read
 * @subpackage filter
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBalanceSystemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_period'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'add_empty' => true)),
      'deposit_standart'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'deposit_expert'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'deposit_super'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'deposit_user'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'charges_standart'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'charges_expert'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'charges_super'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'charges_user'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'in_balance_standart' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'in_balance_super'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'in_balance_expert'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'in_balance_user'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sales_standart'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sales_super'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sales_expert'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'to_pay_standart'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'to_pay_super'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'to_pay_expert'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'r2r_standart'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'r2r_super'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'r2r_expert'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_period'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Period'), 'column' => 'id')),
      'deposit_standart'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'deposit_expert'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'deposit_super'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'deposit_user'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'charges_standart'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'charges_expert'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'charges_super'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'charges_user'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'in_balance_standart' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'in_balance_super'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'in_balance_expert'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'in_balance_user'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'sales_standart'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sales_super'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sales_expert'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'to_pay_standart'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'to_pay_super'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'to_pay_expert'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'r2r_standart'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'r2r_super'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'r2r_expert'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('balance_system_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BalanceSystem';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'id_period'           => 'ForeignKey',
      'deposit_standart'    => 'Number',
      'deposit_expert'      => 'Number',
      'deposit_super'       => 'Number',
      'deposit_user'        => 'Number',
      'charges_standart'    => 'Number',
      'charges_expert'      => 'Number',
      'charges_super'       => 'Number',
      'charges_user'        => 'Number',
      'in_balance_standart' => 'Number',
      'in_balance_super'    => 'Number',
      'in_balance_expert'   => 'Number',
      'in_balance_user'     => 'Number',
      'sales_standart'      => 'Number',
      'sales_super'         => 'Number',
      'sales_expert'        => 'Number',
      'to_pay_standart'     => 'Number',
      'to_pay_super'        => 'Number',
      'to_pay_expert'       => 'Number',
      'r2r_standart'        => 'Number',
      'r2r_super'           => 'Number',
      'r2r_expert'          => 'Number',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
