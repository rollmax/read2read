<?php

/**
 * Vote filter form base class.
 *
 * @package    read2read
 * @subpackage filter
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVoteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_period' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'add_empty' => true)),
      'id_user'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'price'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'position'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'weight'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'joins'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_period' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Period'), 'column' => 'id')),
      'id_user'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'price'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'position'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'weight'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'joins'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('vote_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vote';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'id_period' => 'ForeignKey',
      'id_user'   => 'ForeignKey',
      'price'     => 'Number',
      'position'  => 'Number',
      'weight'    => 'Number',
      'joins'     => 'Number',
    );
  }
}
