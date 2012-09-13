<?php slot('title_page') ?>
    <?php echo $room->getFormatedName() ?> - Раздел для общения
<?php end_slot('title_page') ?>
<table id=room cellpadding="0" cellspacing="0">
  <tr>
    <td class=top colspan =2>
      <p><?php echo $form->getObject()->getTopic()->getRoom()->getName(); ?></p>
    </td><!--   e: top   -->
  </tr>
  <tr>
    <td class=theme>
      <div id=new_theme>
        <p class=new><?php echo $form['content']->renderLabel().'&gt;&gt;'; ?></p>
      </div><!--   e: #new_theme   -->
      <!-- topics list -->
      <?php include_partial('topicList', array('topicsCollection' => $pagerRoom->getResults())); ?>
    </td>
    <td class=comms>
      <div id=input>
        <form name="new_topic_form" method="post" action="<?php echo url_for('room_topic_post_update', $form->getObject()); ?>">
          <?php echo $form->renderHiddenFields(); ?>
          <?php echo $form['content']->renderError(); ?>
          <?php echo $form['content']->render(array('rows' => 8, 'cols' => 80, 'style' => 'margin-top:10px;')); ?>
          <input class=submit type="submit" value="Изменить">
        </form>
      </div><!--   e: #input   -->
    </td><!--   e: #comms   -->
  </tr>
  <tr>
    <td class=theme_list>
    <?php include_partial('roomPager', array('pager'=>$pagerRoom, 'url' => url_for('room_topic_post_edit', $form->getObject()))); ?>
    </td>
    <td class=comms_list>
    </td>
  </tr>
</table><!--   e: #room   -->