<?php

/**
 * Period form base class.
 *
 * @method Period getObject() Returns the current form's model object
 *
 * @package    read2read
 * @subpackage form
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePeriodForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      '1k'        => new sfWidgetFormInputText(),
      'date'      => new sfWidgetFormInputText(),
      'r2r_share' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      '1k'        => new sfValidatorNumber(),
      'date'      => new sfValidatorString(array('max_length' => 7)),
      'r2r_share' => new sfValidatorNumber(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Period', 'column' => array('date')))
    );

    $this->widgetSchema->setNameFormat('period[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Period';
  }

}
