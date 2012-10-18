<?php

/**
 * BalanceUser filter form base class.
 *
 * @package    read2read
 * @subpackage filter
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBalanceUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_user'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'id_period'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'add_empty' => true)),
      'add_funds'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'use_payment'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sell_purchase_cnt' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amount'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'payable'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'was_paid'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'was_paid_amount'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'was_paid_id'       => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_user'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'id_period'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Period'), 'column' => 'id')),
      'add_funds'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'use_payment'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'sell_purchase_cnt' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'amount'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'payable'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'was_paid'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'was_paid_amount'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'was_paid_id'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('balance_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BalanceUser';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'id_user'           => 'ForeignKey',
      'id_period'         => 'ForeignKey',
      'add_funds'         => 'Number',
      'use_payment'       => 'Number',
      'sell_purchase_cnt' => 'Number',
      'amount'            => 'Number',
      'payable'           => 'Number',
      'was_paid'          => 'Boolean',
      'was_paid_amount'   => 'Number',
      'was_paid_id'       => 'Number',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
