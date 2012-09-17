<?php

/**
 * Paragraph form base class.
 *
 * @method Paragraph getObject() Returns the current form's model object
 *
 * @package    read2read
 * @subpackage form
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseParagraphForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'id_content'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'add_empty' => true)),
      'paragraph_ru' => new sfWidgetFormTextarea(),
      'paragraph_en' => new sfWidgetFormTextarea(),
      'is_bold'      => new sfWidgetFormInputCheckbox(),
      'is_italic'    => new sfWidgetFormInputCheckbox(),
      'h_style'      => new sfWidgetFormChoice(array('choices' => array('none' => 'none', 4 => 4, 5 => 5, 6 => 6))),
      'pad_left'     => new sfWidgetFormInputText(),
      'ordered'      => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_content'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Content'), 'required' => false)),
      'paragraph_ru' => new sfValidatorString(),
      'paragraph_en' => new sfValidatorString(),
      'is_bold'      => new sfValidatorBoolean(array('required' => false)),
      'is_italic'    => new sfValidatorBoolean(array('required' => false)),
      'h_style'      => new sfValidatorChoice(array('choices' => array(0 => 'none', 1 => 4, 2 => 5, 3 => 6), 'required' => false)),
      'pad_left'     => new sfValidatorInteger(array('required' => false)),
      'ordered'      => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('paragraph[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Paragraph';
  }

}
