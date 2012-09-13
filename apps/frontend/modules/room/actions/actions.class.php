<?php

/**
 * room actions.
 *
 * @package    read2read
 * @subpackage room
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class roomActions extends sfActions
{

  public function  preExecute()
  {
    if(!$this->getUser()->getGuardUser())
      $this->redirect('homepage');

    $roomName = $this->getRequestParameter('name');
    switch($this->getUSer()->getGuardUser()->getTariff())
    {
      case 'none':
        $accessibleRoom = 'uroom';
        break;
      case 'standart':
        $accessibleRoom = 'sroom';
        break;
      case 'super':
        $accessibleRoom = 'suproom';
        break;
      case 'expert':
        $accessibleRoom = 'exroom';
        break;
    }
    if(!empty($roomName) && $roomName != $accessibleRoom)
      $this->redirect('homepage');
  }

 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404Unless($this->getRoute()->getObject());

    $this->topic = $this->getRoute()->getObject()->getTopicOrderByDate()->getFirst();
    
    if(false !== $this->topic)
    {
        $this->redirect('room_topic_show', $this->topic);
        return;
    }
    $this->room = $this->getRoute()->getObject();
  }

  /**
   * Executes newTopic action
   *
   * @param sfWebRequest $request
   */
  public function executeNewTopic(sfWebRequest $request)
  {
    $this->form = new RoomTopicForm();
    $this->room = $this->getRoute()->getObject();

    $this->pagerRoom  = new sfDoctrinePager('Room', sfConfig::get('app_room_max_topics'));
    $this->pagerRoom->setQuery($this->room->getTopicOrderByDateQuery());
    $this->pagerRoom->setPage($request->getParameter('rpage', 1));
    $this->pagerRoom->init();
  }

  /**
   * Executes createTopic action
   *
   * @param sfWebRequest $request
   */
  public function executeCreateTopic(sfWebRequest $request)
  {
    $this->form = new RoomTopicForm();
    $this->user = $this->getUser()->getGuardUser();
    $this->room = $this->getRoute()->getObject();
    
    $this->pagerRoom = null;

    if(false === $this->processTopicForm($request, $this->form, $this->room, $this->user))
      $this->setTemplate('previewTopic');
    else
      $this->setTemplate('newTopic');
  }

  /**
   * Executes editTopic action
   *
   * @param sfWebRequest $request
   */
  public function executeEditTopic(sfWebRequest $request)
  {
    
  }

  /**
   * Executes showTopic action
   *
   * @param sfWebRequest $request
   */
  public function executeShowTopic(sfWebRequest $request)
  {
    $this->forward404Unless($this->topic = $this->getRoute()->getObject());
    $this->form = new RoomTopicPostForm();
    $this->room = $this->topic->getRoom();
    $this->user = $this->getUSer()->getGuardUser();

    
    $this->pagerRoom  = new sfDoctrinePager('Room', sfConfig::get('app_room_max_topics'));
    $this->pagerRoom->setQuery($this->room->getTopicOrderByDateQuery());
    $this->pagerRoom->setPage($request->getParameter('rpage', 1));
    $this->pagerRoom->init();

    $this->pagerTopic = new sfDoctrinePager('Topic', sfConfig::get('app_room_topic_max_posts'));

    $this->pagerTopic->setQuery($this->topic->getTopicPostsQuery());
    $this->pagerTopic->setPage($request->getParameter('tpage', 1));
    $this->pagerTopic->init();

  }
  
  /**
   * Executes deleteTopic action
   *
   * @param sfWebRequest $request
   */
  public function executeDeleteTopic(sfWebRequest $request)
  {

  }

  /**
   * 
   * @param sfWebRequest $request
   * @param sfForm $form
   * @param Room $room
   * @return <bool> false if preview action
   */
  protected function processTopicForm(sfWebRequest $request, sfForm $form, Room $room, User $user)
  {
    $form->bind(
      $request->getParameter($form->getName()),
      $request->getFiles($form->getName())
    );

    if ($form->isValid())
    {
      if($this->getRequestParameter('submitAct'))
      {
        $values = $form->getValues();
        
        // topic saving
        $topic  = new Topic();
        $topic->setTitle($values['title']);
        $topic->setIdRoom($room->getId());
        $topic->setIdUser($user->getId());
        $topic->save();

        // post saving
        $post = new Post();
        $post->setContent($values['post']['content']);
        $post->setIdTopic($topic->getId());
        $post->setIdUser($user->getId());
        $post->save();

        $this->redirect('room_topic_show', $topic);
      }
      else if($this->getRequestParameter('prevSubmitAct'))
        return;
      else
        return false;

    }
  }


  /**
   * Executes createPost action
   *
   * @param sfWebRequest $request
   */
  public function executeCreatePost(sfWebRequest $request)
  {
    $this->forward404Unless($this->topic = $this->getRoute()->getObject());

    $this->form = new RoomTopicPostForm();
    $this->room = $this->topic->getRoom();
    $this->user = $this->getUser()->getGuardUser();

    $this->processPostForm($request, $this->form, $this->getRoute()->getObject());

    $this->setTemplate('showTopic');
  }

  /**
   * Executes editPost action
   *
   * @param sfWebRequest $request
   */
  public function executeEditPost(sfWebRequest $request)
  {
    $this->forward404Unless($this->getRoute()->getObject());

    $this->form = new RoomTopicPostForm($this->getRoute()->getObject());

    $this->room = $this->getRoute()->getObject()->getTopic()->getRoom();

    $this->pagerRoom  = new sfDoctrinePager('Room', sfConfig::get('app_room_max_topics'));
    $this->pagerRoom->setQuery($this->room->getTopicOrderByDateQuery());
    $this->pagerRoom->setPage($request->getParameter('rpage', 1));
    $this->pagerRoom->init();
  }

  
  /**
   * Executes updatePost action
   *
   * @param sfWebRequest $request
   */
  public function executeUpdatePost(sfWebRequest $request)
  {
    $this->forward404Unless($this->getRoute()->getObject());
    $this->form = new RoomTopicPostForm($this->getRoute()->getObject());

    $this->processPostForm($request, $this->form);
    
    $this->setTemplate('editPost');
  }

  /**
   * Executes deletePost action
   *
   * @param sfWebRequest $request
   */
  public function executeDeletePost(sfWebRequest $request)
  {
    $this->forward404Unless($post = $this->getRoute()->getObject());

    $topic = $post->getTopic();

    // checking is post author equals current logged user
    if($post->getUser()->getId() != $this->getUSer()->getGuardUser()->getId())
      $this->redirect('room_topic_show', $topic);

    
    if(!$post->delete())
      $this->getUser()->setFlash('errorMessage', 'Can not delete post ' . $post->getId());

    $this->redirect('room_topic_show', $topic);
  }


  /**
   * Process post form action
   *
   * @param sfWebRequest $request
   * @param sfForm $form
   */
  protected function processPostForm(sfWebRequest $request, sfForm $form, Topic $topic = null)
  {
    $form->bind(
      $request->getParameter($form->getName()),
      $request->getFiles($form->getName())
    );

    if ($form->isValid())
    {
      $post = $form->save();
      
      if(null !== $topic)
      {
        $post->id_user = $this->getUser()->getGuardUser()->getId();
        $post->id_topic = $topic->getId();
        $post->save();
      }
      else
        $topic = $form->getObject()->getTopic();
      
      $this->redirect('room_topic_show', $topic);

    }
  }


}
