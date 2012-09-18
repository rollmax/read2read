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
        'method'=> 'getNameLanguages'
    ));

    $this->validatorSchema['id_category'] = new sfValidatorDoctrineChoice(array(
        'model' => $this->getRelatedModelName('Category'), 
        'required' => true
    ));

    // title_en
    $this->widgetSchema['title_en'] = new sfWidgetFormInputText(array(
      'label' => 'Введите название на английском'
    ));
    
    // title_ru
    $this->widgetSchema['title_ru'] = new sfWidgetFormInputText(array(
      'label' => 'Введите название на русском'
    ));

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
  }
}
