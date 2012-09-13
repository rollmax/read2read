<?php

/**
 * Statistics form base class.
 *
 * @method Statistics getObject() Returns the current form's model object
 *
 * @package    read2read
 * @subpackage form
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStatisticsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'period_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'add_empty' => true)),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      '1_buy'       => new sfWidgetFormInputText(),
      '1_login'     => new sfWidgetFormInputText(),
      '2_buy'       => new sfWidgetFormInputText(),
      '2_login'     => new sfWidgetFormInputText(),
      '3_buy'       => new sfWidgetFormInputText(),
      '3_login'     => new sfWidgetFormInputText(),
      '4_buy'       => new sfWidgetFormInputText(),
      '4_login'     => new sfWidgetFormInputText(),
      '5_buy'       => new sfWidgetFormInputText(),
      '5_login'     => new sfWidgetFormInputText(),
      '6_buy'       => new sfWidgetFormInputText(),
      '6_login'     => new sfWidgetFormInputText(),
      '7_buy'       => new sfWidgetFormInputText(),
      '7_login'     => new sfWidgetFormInputText(),
      '8_buy'       => new sfWidgetFormInputText(),
      '8_login'     => new sfWidgetFormInputText(),
      '9_buy'       => new sfWidgetFormInputText(),
      '9_login'     => new sfWidgetFormInputText(),
      '10_buy'      => new sfWidgetFormInputText(),
      '10_login'    => new sfWidgetFormInputText(),
      '11_buy'      => new sfWidgetFormInputText(),
      '11_login'    => new sfWidgetFormInputText(),
      '12_buy'      => new sfWidgetFormInputText(),
      '12_login'    => new sfWidgetFormInputText(),
      '13_buy'      => new sfWidgetFormInputText(),
      '13_login'    => new sfWidgetFormInputText(),
      '14_buy'      => new sfWidgetFormInputText(),
      '14_login'    => new sfWidgetFormInputText(),
      '15_buy'      => new sfWidgetFormInputText(),
      '15_login'    => new sfWidgetFormInputText(),
      '16_buy'      => new sfWidgetFormInputText(),
      '16_login'    => new sfWidgetFormInputText(),
      '17_buy'      => new sfWidgetFormInputText(),
      '17_login'    => new sfWidgetFormInputText(),
      '18_buy'      => new sfWidgetFormInputText(),
      '18_login'    => new sfWidgetFormInputText(),
      '19_buy'      => new sfWidgetFormInputText(),
      '19_login'    => new sfWidgetFormInputText(),
      '20_buy'      => new sfWidgetFormInputText(),
      '20_login'    => new sfWidgetFormInputText(),
      '21_buy'      => new sfWidgetFormInputText(),
      '21_login'    => new sfWidgetFormInputText(),
      '22_buy'      => new sfWidgetFormInputText(),
      '22_login'    => new sfWidgetFormInputText(),
      '23_buy'      => new sfWidgetFormInputText(),
      '23_login'    => new sfWidgetFormInputText(),
      '24_buy'      => new sfWidgetFormInputText(),
      '24_login'    => new sfWidgetFormInputText(),
      '25_buy'      => new sfWidgetFormInputText(),
      '25_login'    => new sfWidgetFormInputText(),
      '26_buy'      => new sfWidgetFormInputText(),
      '26_login'    => new sfWidgetFormInputText(),
      '27_buy'      => new sfWidgetFormInputText(),
      '27_login'    => new sfWidgetFormInputText(),
      '28_buy'      => new sfWidgetFormInputText(),
      '28_login'    => new sfWidgetFormInputText(),
      '29_buy'      => new sfWidgetFormInputText(),
      '29_login'    => new sfWidgetFormInputText(),
      '30_buy'      => new sfWidgetFormInputText(),
      '30_login'    => new sfWidgetFormInputText(),
      '31_buy'      => new sfWidgetFormInputText(),
      '31_login'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'period_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Period'), 'required' => false)),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'required' => false)),
      '1_buy'       => new sfValidatorInteger(),
      '1_login'     => new sfValidatorInteger(),
      '2_buy'       => new sfValidatorInteger(),
      '2_login'     => new sfValidatorInteger(),
      '3_buy'       => new sfValidatorInteger(),
      '3_login'     => new sfValidatorInteger(),
      '4_buy'       => new sfValidatorInteger(),
      '4_login'     => new sfValidatorInteger(),
      '5_buy'       => new sfValidatorInteger(),
      '5_login'     => new sfValidatorInteger(),
      '6_buy'       => new sfValidatorInteger(),
      '6_login'     => new sfValidatorInteger(),
      '7_buy'       => new sfValidatorInteger(),
      '7_login'     => new sfValidatorInteger(),
      '8_buy'       => new sfValidatorInteger(),
      '8_login'     => new sfValidatorInteger(),
      '9_buy'       => new sfValidatorInteger(),
      '9_login'     => new sfValidatorInteger(),
      '10_buy'      => new sfValidatorInteger(),
      '10_login'    => new sfValidatorInteger(),
      '11_buy'      => new sfValidatorInteger(),
      '11_login'    => new sfValidatorInteger(),
      '12_buy'      => new sfValidatorInteger(),
      '12_login'    => new sfValidatorInteger(),
      '13_buy'      => new sfValidatorInteger(),
      '13_login'    => new sfValidatorInteger(),
      '14_buy'      => new sfValidatorInteger(),
      '14_login'    => new sfValidatorInteger(),
      '15_buy'      => new sfValidatorInteger(),
      '15_login'    => new sfValidatorInteger(),
      '16_buy'      => new sfValidatorInteger(),
      '16_login'    => new sfValidatorInteger(),
      '17_buy'      => new sfValidatorInteger(),
      '17_login'    => new sfValidatorInteger(),
      '18_buy'      => new sfValidatorInteger(),
      '18_login'    => new sfValidatorInteger(),
      '19_buy'      => new sfValidatorInteger(),
      '19_login'    => new sfValidatorInteger(),
      '20_buy'      => new sfValidatorInteger(),
      '20_login'    => new sfValidatorInteger(),
      '21_buy'      => new sfValidatorInteger(),
      '21_login'    => new sfValidatorInteger(),
      '22_buy'      => new sfValidatorInteger(),
      '22_login'    => new sfValidatorInteger(),
      '23_buy'      => new sfValidatorInteger(),
      '23_login'    => new sfValidatorInteger(),
      '24_buy'      => new sfValidatorInteger(),
      '24_login'    => new sfValidatorInteger(),
      '25_buy'      => new sfValidatorInteger(),
      '25_login'    => new sfValidatorInteger(),
      '26_buy'      => new sfValidatorInteger(),
      '26_login'    => new sfValidatorInteger(),
      '27_buy'      => new sfValidatorInteger(),
      '27_login'    => new sfValidatorInteger(),
      '28_buy'      => new sfValidatorInteger(),
      '28_login'    => new sfValidatorInteger(),
      '29_buy'      => new sfValidatorInteger(),
      '29_login'    => new sfValidatorInteger(),
      '30_buy'      => new sfValidatorInteger(),
      '30_login'    => new sfValidatorInteger(),
      '31_buy'      => new sfValidatorInteger(),
      '31_login'    => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('statistics[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Statistics';
  }

}
