<?php

/**
 * Category filter form base class.
 *
 * @package    read2read
 * @subpackage filter
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name_en'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_ru'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ordered'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_free'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'purchase_cnt'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'page_keywords'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'page_description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name_en'          => new sfValidatorPass(array('required' => false)),
      'name_ru'          => new sfValidatorPass(array('required' => false)),
      'ordered'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_free'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'purchase_cnt'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'page_keywords'    => new sfValidatorPass(array('required' => false)),
      'page_description' => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'name_en'          => 'Text',
      'name_ru'          => 'Text',
      'ordered'          => 'Number',
      'is_free'          => 'Boolean',
      'purchase_cnt'     => 'Number',
      'page_keywords'    => 'Text',
      'page_description' => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
