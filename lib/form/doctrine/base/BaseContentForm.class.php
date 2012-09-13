<?php

/**
 * Content form base class.
 *
 * @method Content getObject() Returns the current form's model object
 *
 * @package    read2read
 * @subpackage form
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'id_user'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'id_category'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'title_ru'       => new sfWidgetFormTextarea(),
      'title_en'       => new sfWidgetFormTextarea(),
      'author_ru'      => new sfWidgetFormInputText(),
      'author_en'      => new sfWidgetFormInputText(),
      'pretext_ru'     => new sfWidgetFormTextarea(),
      'pretext_en'     => new sfWidgetFormTextarea(),
      'photo_ru'       => new sfWidgetFormInputText(),
      'photo_en'       => new sfWidgetFormInputText(),
      'state'          => new sfWidgetFormChoice(array('choices' => array('draft' => 'draft', 'public' => 'public', 'deleted' => 'deleted'))),
      'is_blocked'     => new sfWidgetFormInputCheckbox(),
      'is_moderated'   => new sfWidgetFormInputCheckbox(),
      'to_delete'      => new sfWidgetFormInputCheckbox(),
      'pub_date'       => new sfWidgetFormDate(),
      'letters_k'      => new sfWidgetFormInputText(),
      'is_free'        => new sfWidgetFormInputCheckbox(),
      'purchase_cnt'   => new sfWidgetFormInputText(),
      'cont_rate'      => new sfWidgetFormInputText(),
      'trans_rate'     => new sfWidgetFormInputText(),
      'r2r_cont_rate'  => new sfWidgetFormInputText(),
      'r2r_trans_rate' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_user'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'id_category'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'required' => false)),
      'title_ru'       => new sfValidatorString(array('max_length' => 1000)),
      'title_en'       => new sfValidatorString(array('max_length' => 1000)),
      'author_ru'      => new sfValidatorString(array('max_length' => 200)),
      'author_en'      => new sfValidatorString(array('max_length' => 200)),
      'pretext_ru'     => new sfValidatorString(array('max_length' => 2000)),
      'pretext_en'     => new sfValidatorString(array('max_length' => 2000)),
      'photo_ru'       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'photo_en'       => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'state'          => new sfValidatorChoice(array('choices' => array(0 => 'draft', 1 => 'public', 2 => 'deleted'), 'required' => false)),
      'is_blocked'     => new sfValidatorBoolean(array('required' => false)),
      'is_moderated'   => new sfValidatorBoolean(array('required' => false)),
      'to_delete'      => new sfValidatorBoolean(array('required' => false)),
      'pub_date'       => new sfValidatorDate(),
      'letters_k'      => new sfValidatorInteger(array('required' => false)),
      'is_free'        => new sfValidatorBoolean(array('required' => false)),
      'purchase_cnt'   => new sfValidatorInteger(),
      'cont_rate'      => new sfValidatorNumber(),
      'trans_rate'     => new sfValidatorNumber(),
      'r2r_cont_rate'  => new sfValidatorNumber(),
      'r2r_trans_rate' => new sfValidatorNumber(),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Content';
  }

}
