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
class ArticlePretextForm extends ContentForm
{

  public function configure()
  {
    $this->useFields(array('pretext_en', 'pretext_ru', 'author_en', 'author_ru', 'photo_ru', 'photo_en'));

    $this->widgetSchema->setLabels(array(
        'pretext_en'=>'Введите претекст на английском',
        'pretext_ru'=>'Введите претекст на русском',
        'author_en'=>'Введите имя автора на английском',
        'author_ru'=>'Введите имя автора на русском'
    ));

    $this->widgetSchema['photo_ru'] = new sfWidgetFormInputFile(array(
      'label' => 'Добавьте картинку'
    ));

    $this->widgetSchema['photo_en'] = new sfWidgetFormInputFile(array(
      'label' => 'Добавьте картинку'
    ));

    $this->validatorSchema['photo_ru'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/articles/ru',
      'mime_types' => 'web_images',
    ));
    
    $this->validatorSchema['photo_en'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/articles/en',
      'mime_types' => 'web_images',
    ));

  }
}