<?php

class ArticleCommentForm extends BaseCommentForm
{
    public function  configure()
    {
        $this->useFields(array('comment_en', 'comment_ru'));

        $this->widgetSchema['comment_en']->setAttribute('class', 'comment_en');
        $this->widgetSchema['comment_en']->setAttribute('cols', '');
        $this->widgetSchema['comment_en']->setAttribute('rows', '');

        $this->widgetSchema['comment_ru']->setAttribute('class', 'comment_ru');
        $this->widgetSchema['comment_ru']->setAttribute('rows', '');
        $this->widgetSchema['comment_ru']->setAttribute('cols', '');
    }
}