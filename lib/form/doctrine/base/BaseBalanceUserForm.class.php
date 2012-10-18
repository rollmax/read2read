<?php

/**
 * BalanceUser form base class.
 *
 * @method BalanceUser getObject() Returns the current form's model object
 *
 * @package    read2read
 * @subpackage form
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBalanceUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'id_user'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'id_period'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'add_empty' => true)),
      'add_funds'         => new sfWidgetFormInputText(),
      'use_payment'       => new sfWidgetFormInputText(),
      'sell_purchase_cnt' => new sfWidgetFormInputText(),
      'amount'            => new sfWidgetFormInputText(),
      'payable'           => new sfWidgetFormInputText(),
      'was_paid'          => new sfWidgetFormInputCheckbox(),
      'was_paid_amount'   => new sfWidgetFormInputText(),
      'was_paid_id'       => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_user'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'id_period'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'required' => false)),
      'add_funds'         => new sfValidatorNumber(),
      'use_payment'       => new sfValidatorNumber(),
      'sell_purchase_cnt' => new sfValidatorInteger(),
      'amount'            => new sfValidatorNumber(),
      'payable'           => new sfValidatorNumber(),
      'was_paid'          => new sfValidatorBoolean(array('required' => false)),
      'was_paid_amount'   => new sfValidatorNumber(),
      'was_paid_id'       => new sfValidatorInteger(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('balance_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BalanceUser';
  }

}
