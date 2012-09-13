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
<!--      topics list-->
      <?php include_partial('topicList', array('topicsCollection' => $room->getTopicOrderByDate())); ?>
    </td><!--   e:  td class=theme -->
    <td class=comms>
      <?php foreach($room->getTopic() as $topic): ?>
      <a href="<?php echo url_for('room_topic_show', $topic); ?>">
        <p class="topicTitle"><?php echo $topic->getTitle(); ?></p>
      </a>
      <?php endforeach; ?>
    </td>
    <!--   e:  td class=comms -->
  </tr>
  <tr>
    <td class=theme_list>
<!--      <p class=act>1</p>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>-->
    </td>
    <td class=comms_list>
<!--      <p class=act>1</p>
      <a href="#">2</a>
      <a href="#">3</a>
      <a href="#">4</a>-->
    </td>
  </tr>
</table><!--   e: #room   -->