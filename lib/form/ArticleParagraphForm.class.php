<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticlePretextForm
 *
 * @author kalupathor
 */
class ArticleParagraphForm extends ParagraphForm
{

  public function configure()
  {
    $this->useFields(array('paragraph_en', 'paragraph_ru', 'is_bold', 'is_italic', 'h_style', 'pad_left'));

    $this->widgetSchema->setLabels(array(
        'paragraph_en'=>'Введите абзац на английском',
        'paragraph_ru'=>'Введите абзац на русском'
    ));

      $this->widgetSchema['paragraph_en'] = new sfWidgetFormTextarea(
          array(),
          array('readonly' => 'readonly')
      );

      $this->widgetSchema['paragraph_ru'] = new sfWidgetFormTextarea(
          array(),
          array('readonly' => 'readonly')
      );

      $this->validatorSchema['paragraph_en'] = new sfValidatorString(array('required' => false));
      $this->validatorSchema['paragraph_ru'] = new sfValidatorString(array('required' => false));

      $this->widgetSchema['is_bold'] = new sfWidgetFormInputCheckbox(array(
          'label' => 'Жирный',
      ), array('class' => 'checkbox'));

      $this->widgetSchema['is_italic'] = new sfWidgetFormInputCheckbox(array(
          'label' => 'Курсив',
      ), array('class' => 'checkbox'));

      $choices = $this->getWidget('h_style')->getChoices();
      $choices['none'] = '';

      $this->widgetSchema['h_style'] = new sfWidgetFormChoice(array(
          'choices' => $choices,
          'label' => 'Заголовок',
      ), array('class' => 'heads_4_6'));

      $this->widgetSchema['pad_left'] = new sfWidgetFormInputText(array(
          'label' => 'Отступ (%)'
      ), array('class' => 'indent', 'maxlength' => '2'));
  }
}