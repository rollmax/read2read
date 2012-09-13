<?php

/**
 * Category form base class.
 *
 * @method Category getObject() Returns the current form's model object
 *
 * @package    read2read
 * @subpackage form
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'name_en'          => new sfWidgetFormInputText(),
      'name_ru'          => new sfWidgetFormInputText(),
      'ordered'          => new sfWidgetFormInputText(),
      'is_free'          => new sfWidgetFormInputCheckbox(),
      'purchase_cnt'     => new sfWidgetFormInputText(),
      'page_keywords'    => new sfWidgetFormTextarea(),
      'page_description' => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name_en'          => new sfValidatorString(array('max_length' => 255)),
      'name_ru'          => new sfValidatorString(array('max_length' => 255)),
      'ordered'          => new sfValidatorInteger(array('required' => false)),
      'is_free'          => new sfValidatorBoolean(array('required' => false)),
      'purchase_cnt'     => new sfValidatorInteger(),
      'page_keywords'    => new sfValidatorString(array('required' => false)),
      'page_description' => new sfValidatorString(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

}
