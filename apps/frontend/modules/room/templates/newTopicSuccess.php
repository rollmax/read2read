<?php slot('title_page') ?>
    <?php echo $room->getFormatedName() ?> - Раздел для общения
<?php end_slot('title_page') ?>
<table id=room cellpadding="0" cellspacing="0">
  <tr>
    <td class=top colspan =2>
      <p><?php echo $room->getName(); ?></p>
    </td><!--   e: top   -->
  </tr>
  <tr>
    <td class=theme>
      <div id=new_theme>
        <p class=new><?php echo $form['title']->renderLabel(); ?></p>
        <p class=new><?php echo $form['post']['content']->renderLabel(); ?></p>
      </div><!--   e: #new_theme   -->
      <!-- topics list -->
      <?php if(null !== $pagerRoom): ?>
          <?php include_partial('topicList', array('topicsCollection' => $pagerRoom->getResults())); ?>
      <?php endif; ?>
    </td>
    <td class=comms>
      <div id=input>
        <form name="new_topic_form" method="post" action="<?php echo url_for('room_topic_create', $room); ?>">
          <?php echo $form->renderHiddenFields(); ?>
          <?php echo $form['title']->renderError(); ?>
          <?php echo $form['title']->render(array('class'=>'theme_header')); ?>
          
          <?php echo $form['post']['content']->renderError(); ?>
          <?php echo $form['post']['content']->render(array('rows'=>8, 'cols'=>80)); ?>
          <input class=submit type="submit" name="submitAct" value="Начать">
          
        </form>
        <a onclick="document.new_topic_form.submit();"><p class=preview>Предварительный просмотр</p></a>
      </div><!--   e: #input   -->
    </td><!--   e: #comms   -->
  </tr>
  <tr>
    <td class=theme_list>
    <?php if(null !== $pagerRoom): ?>
        <?php include_partial('roomPager', array('pager'=>$pagerRoom, 'url' => url_for('room_topic_new', $room))); ?>
    <?php endif; ?>
    </td>
    <td class=comms_list>
    </td>
  </tr>
</table><!--   e: #room   -->