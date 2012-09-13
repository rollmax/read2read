<?php

class ArticleCommentForm extends BaseCommentForm
{
  public function  configure()
  {
    $this->useFields(array('comment_en', 'comment_ru'));
  }
}