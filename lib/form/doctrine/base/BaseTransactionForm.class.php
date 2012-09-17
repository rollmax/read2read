<?php

/**
 * Transaction form base class.
 *
 * @method Transaction getObject() Returns the current form's model object
 *
 * @package    read2read
 * @subpackage form
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTransactionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'id_period'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'add_empty' => true)),
      'operation'               => new sfWidgetFormChoice(array('choices' => array('none' => 'none', 'deposit_u' => 'deposit_u', 'deposit_p' => 'deposit_p', 'purchase' => 'purchase', 'charges_service' => 'charges_service'))),
      'amount'                  => new sfWidgetFormInputText(),
      'id_sender'               => new sfWidgetFormInputText(),
      'id_receiver'             => new sfWidgetFormInputText(),
      'sender_balance_before'   => new sfWidgetFormInputText(),
      'sender_balance_after'    => new sfWidgetFormInputText(),
      'receiver_balance_before' => new sfWidgetFormInputText(),
      'receiver_balance_after'  => new sfWidgetFormInputText(),
      'notes'                   => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_period'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'required' => false)),
      'operation'               => new sfValidatorChoice(array('choices' => array(0 => 'none', 1 => 'deposit_u', 2 => 'deposit_p', 3 => 'purchase', 4 => 'charges_service'), 'required' => false)),
      'amount'                  => new sfValidatorNumber(),
      'id_sender'               => new sfValidatorInteger(array('required' => false)),
      'id_receiver'             => new sfValidatorInteger(array('required' => false)),
      'sender_balance_before'   => new sfValidatorNumber(),
      'sender_balance_after'    => new sfValidatorNumber(),
      'receiver_balance_before' => new sfValidatorNumber(),
      'receiver_balance_after'  => new sfValidatorNumber(),
      'notes'                   => new sfValidatorString(array('max_length' => 255)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('transaction[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Transaction';
  }

}
