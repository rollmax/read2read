<?php
class RoomTopicForm extends TopicForm
{
  public function  configure()
  {
    $this->useFields(array(
      'title'
    ));

    $this->embedForm('post', new RoomTopicPostForm());

    $this->widgetSchema->setLabels(array(
      'title' => 'Заголовок новой темы &gt;'
    ));

    $this->widgetSchema['post']['content']->setLabel('Текст новой темы &gt;&gt;');

    $this->validatorSchema['title']->setOption('required', true);
  }
}