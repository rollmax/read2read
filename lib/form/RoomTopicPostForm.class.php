<?php
class RoomTopicPostForm extends PostForm
{
  public function  configure()
  {
    $this->useFields(array(
      'content'
    ));
    $this->widgetSchema->setLabels(array(
      'content' => 'Текст сообщения'
    ));
    
  }
}