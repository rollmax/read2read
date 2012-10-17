<?php

/**
 * Content filter form base class.
 *
 * @package    read2read
 * @subpackage filter
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_user'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'id_category'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'title_ru'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title_en'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'author_ru'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'author_en'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'photo_ru'       => new sfWidgetFormFilterInput(),
      'photo_en'       => new sfWidgetFormFilterInput(),
      'state'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'draft' => 'draft', 'public' => 'public', 'deleted' => 'deleted'))),
      'is_bold'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_italic'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'h_style'        => new sfWidgetFormChoice(array('choices' => array('' => '', 'none' => 'none', 1 => 1, 2 => 2, 3 => 3))),
      'is_blocked'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_moderated'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'to_delete'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pub_date'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'letters_k'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_free'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'purchase_cnt'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cont_rate'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'trans_rate'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'r2r_cont_rate'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'r2r_trans_rate' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_user'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'id_category'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'title_ru'       => new sfValidatorPass(array('required' => false)),
      'title_en'       => new sfValidatorPass(array('required' => false)),
      'author_ru'      => new sfValidatorPass(array('required' => false)),
      'author_en'      => new sfValidatorPass(array('required' => false)),
      'photo_ru'       => new sfValidatorPass(array('required' => false)),
      'photo_en'       => new sfValidatorPass(array('required' => false)),
      'state'          => new sfValidatorChoice(array('required' => false, 'choices' => array('draft' => 'draft', 'public' => 'public', 'deleted' => 'deleted'))),
      'is_bold'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_italic'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'h_style'        => new sfValidatorChoice(array('required' => false, 'choices' => array('none' => 'none', 1 => 1, 2 => 2, 3 => 3))),
      'is_blocked'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_moderated'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'to_delete'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pub_date'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'letters_k'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_free'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'purchase_cnt'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cont_rate'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'trans_rate'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'r2r_cont_rate'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'r2r_trans_rate' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('content_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Content';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'id_user'        => 'ForeignKey',
      'id_category'    => 'ForeignKey',
      'title_ru'       => 'Text',
      'title_en'       => 'Text',
      'author_ru'      => 'Text',
      'author_en'      => 'Text',
      'photo_ru'       => 'Text',
      'photo_en'       => 'Text',
      'state'          => 'Enum',
      'is_bold'        => 'Boolean',
      'is_italic'      => 'Boolean',
      'h_style'        => 'Enum',
      'is_blocked'     => 'Boolean',
      'is_moderated'   => 'Boolean',
      'to_delete'      => 'Boolean',
      'pub_date'       => 'Date',
      'letters_k'      => 'Number',
      'is_free'        => 'Boolean',
      'purchase_cnt'   => 'Number',
      'cont_rate'      => 'Number',
      'trans_rate'     => 'Number',
      'r2r_cont_rate'  => 'Number',
      'r2r_trans_rate' => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
