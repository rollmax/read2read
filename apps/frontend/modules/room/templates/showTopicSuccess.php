<?php slot('title_page') ?>
    <?php echo $room->getFormatedName() ?> - Раздел для общения
<?php end_slot('title_page') ?>
<table id=room cellpadding="0" cellspacing="0">
  <tr>
    <td class=top colspan =2>
      <p><?php echo $room->getName(); ?></p>
    </td>
  </tr>
  <tr>
    <td class=theme>
      <div id=new_theme>
        <a href="<?php echo url_for('room_topic_new', $room); ?>">
          <p>Начать новую тему &gt;&gt;</p>
        </a>
      </div><!--   e: #new_theme   -->
      <!-- topics list-->
      <?php include_partial('topicList', array('topicsCollection' => $pagerRoom->getResults())); ?>
    </td><!--   e:  td class=theme -->
    <td class=comms>
      <p class=theme_header><?php echo $topic->getTitle(); ?></p>
      <!-- topic posts-->
      <?php include_partial('topicPosts', array('posts' => $pagerTopic->getResults(), 'user' => $user)); ?>
      <!-- add message form-->
      <?php include_partial('postForm', array('form'=>$form, 'topic'=>$topic)); ?>

    </td>
    <!--   e:  td class=comms -->
  </tr>
  <tr>
    <td class=theme_list>
    <?php include_partial('roomPager', array('pager'=>$pagerRoom, 'url' => url_for('room_topic_show',$topic))); ?>
    </td>
    <td class=comms_list>
    <?php if ($pagerTopic->haveToPaginate()): ?>
      <?php foreach ($pagerTopic->getLinks() as $page): ?>
        <?php if ($page == $pagerTopic->getPage()): ?>
          <p class=act><?php echo $page ?></p>
        <?php else: ?>
          <a href="<?php echo url_for('room_topic_show', $topic) ?>?tpage=<?php echo $page ?>"><?php echo $page ?></a>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
    </td>
  </tr>
</table><!--   e: #room   -->