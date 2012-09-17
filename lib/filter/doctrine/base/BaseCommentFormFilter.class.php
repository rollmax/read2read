<?php

/**
 * Comment filter form base class.
 *
 * @package    read2read
 * @subpackage filter
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCommentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_paragraph' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paragraph'), 'add_empty' => true)),
      'comment_ru'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comment_en'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ordered'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_paragraph' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Paragraph'), 'column' => 'id')),
      'comment_ru'   => new sfValidatorPass(array('required' => false)),
      'comment_en'   => new sfValidatorPass(array('required' => false)),
      'ordered'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comment';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'id_paragraph' => 'ForeignKey',
      'comment_ru'   => 'Text',
      'comment_en'   => 'Text',
      'ordered'      => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
