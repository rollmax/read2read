<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticleTitleForm
 *
 * @author kalupathor
 */
class ArticleTitleForm extends ContentForm
{

  public function configure()
  {
    $this->useFields(array('id_category', 'title_en', 'title_ru', 'is_bold', 'is_italic', 'h_style'));

    // id_category
    $this->widgetSchema['id_category'] = new sfWidgetFormDoctrineChoice(array(
        'model' => $this->getRelatedModelName('Category'),
        'add_empty' => true,
        'label' => 'Выберите раздел',
        'method'=> 'getNameLanguages',
        'order_by' => array('ordered', 'asc')
        ), array(
        'class' => 'part'
    ));

    $this->validatorSchema['id_category'] = new sfValidatorDoctrineChoice(array(
        'model' => $this->getRelatedModelName('Category'),
        'required' => true
    ));

    // title_en
    $this->widgetSchema['title_en'] = new sfWidgetFormTextArea(
        array('label' => 'Введите название на английском'),
        array('class' => 'text_en', 'cols' => '', 'rows' => '')
    );

    // title_ru
    $this->widgetSchema['title_ru'] = new sfWidgetFormTextArea(
        array('label' => 'Введите название на русском'),
        array('class' => 'text_ru', 'cols' => '', 'rows' => '')
    );

      $this->widgetSchema['is_bold'] = new sfWidgetFormInputCheckbox(array(
          'label' => 'Жирный',
      ), array('class' => 'checkbox'));

      $this->widgetSchema['is_italic'] = new sfWidgetFormInputCheckbox(array(
          'label' => 'Курсив',
      ), array('class' => 'checkbox'));

      $choices = $this->getWidget('h_style')->getChoices();
      $choices['none'] = '';

      $this->widgetSchema['h_style'] = new sfWidgetFormChoice(array(
          'label' => 'Заголовок',
          'choices' => $choices,
      ), array('class' => 'heads_1_6'));

      $this->validatorSchema['title_en'] = new sfValidatorString(array('required' => true));
      $this->validatorSchema['title_ru'] = new sfValidatorString(array('required' => true));
  }
}
