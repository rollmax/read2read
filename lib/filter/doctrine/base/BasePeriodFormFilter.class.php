<?php

/**
 * Period filter form base class.
 *
 * @package    read2read
 * @subpackage filter
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePeriodFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      '1k'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'date'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'r2r_share' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      '1k'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'date'      => new sfValidatorPass(array('required' => false)),
      'r2r_share' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('period_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Period';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      '1k'        => 'Number',
      'date'      => 'Text',
      'r2r_share' => 'Number',
    );
  }
}
