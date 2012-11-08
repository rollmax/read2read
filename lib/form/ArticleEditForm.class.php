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
class ArticleEditForm extends ContentForm
{

    public function configure()
    {
        $this->useFields(array('author_en', 'author_ru'));

        $this->widgetSchema->setLabels(
            array(
                'author_en' => 'Введите имя автора на английском',
                'author_ru' => 'Введите имя автора на русском'
            )
        );

    }
}