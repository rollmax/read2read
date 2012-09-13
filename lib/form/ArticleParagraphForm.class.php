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
    $this->useFields(array('paragraph_en', 'paragraph_ru'));

    $this->widgetSchema->setLabels(array(
        'paragraph_en'=>'Введите абзац на английском',
        'paragraph_ru'=>'Введите абзац на русском'
    ));
  }
}