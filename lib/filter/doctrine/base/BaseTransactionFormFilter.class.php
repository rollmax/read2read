<?php

/**
 * Transaction filter form base class.
 *
 * @package    read2read
 * @subpackage filter
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTransactionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_period'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'add_empty' => true)),
      'operation'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'none' => 'none', 'deposit_u' => 'deposit_u', 'deposit_p' => 'deposit_p', 'purchase' => 'purchase', 'charges_service' => 'charges_service'))),
      'amount'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_sender'               => new sfWidgetFormFilterInput(),
      'id_receiver'             => new sfWidgetFormFilterInput(),
      'sender_balance_before'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sender_balance_after'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'receiver_balance_before' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'receiver_balance_after'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'notes'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_period'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Period'), 'column' => 'id')),
      'operation'               => new sfValidatorChoice(array('required' => false, 'choices' => array('none' => 'none', 'deposit_u' => 'deposit_u', 'deposit_p' => 'deposit_p', 'purchase' => 'purchase', 'charges_service' => 'charges_service'))),
      'amount'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'id_sender'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_receiver'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sender_balance_before'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'sender_balance_after'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'receiver_balance_before' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'receiver_balance_after'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'notes'                   => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('transaction_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Transaction';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'id_period'               => 'ForeignKey',
      'operation'               => 'Enum',
      'amount'                  => 'Number',
      'id_sender'               => 'Number',
      'id_receiver'             => 'Number',
      'sender_balance_before'   => 'Number',
      'sender_balance_after'    => 'Number',
      'receiver_balance_before' => 'Number',
      'receiver_balance_after'  => 'Number',
      'notes'                   => 'Text',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
