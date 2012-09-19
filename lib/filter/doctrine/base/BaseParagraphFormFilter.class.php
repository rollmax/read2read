<?php

/**
 * Paragraph filter form base class.
 *
 * @package    read2read
 * @subpackage filter
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseParagraphFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_content'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'add_empty' => true)),
      'paragraph_ru' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'paragraph_en' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_photo'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'photo_ru'     => new sfWidgetFormFilterInput(),
      'photo_en'     => new sfWidgetFormFilterInput(),
      'is_bold'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_italic'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'h_style'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'none' => 'none', 4 => 4, 5 => 5, 6 => 6))),
      'pad_left'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ordered'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_content'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Content'), 'column' => 'id')),
      'paragraph_ru' => new sfValidatorPass(array('required' => false)),
      'paragraph_en' => new sfValidatorPass(array('required' => false)),
      'is_photo'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'photo_ru'     => new sfValidatorPass(array('required' => false)),
      'photo_en'     => new sfValidatorPass(array('required' => false)),
      'is_bold'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_italic'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'h_style'      => new sfValidatorChoice(array('required' => false, 'choices' => array('none' => 'none', 4 => 4, 5 => 5, 6 => 6))),
      'pad_left'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ordered'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('paragraph_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Paragraph';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'id_content'   => 'ForeignKey',
      'paragraph_ru' => 'Text',
      'paragraph_en' => 'Text',
      'is_photo'     => 'Boolean',
      'photo_ru'     => 'Text',
      'photo_en'     => 'Text',
      'is_bold'      => 'Boolean',
      'is_italic'    => 'Boolean',
      'h_style'      => 'Enum',
      'pad_left'     => 'Number',
      'ordered'      => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
