<?php slot('title_page') ?>
    <?php echo $room->getFormatedName() ?> - Раздел для общения
<?php end_slot('title_page') ?>
<table id=room cellpadding="0" cellspacing="0">
  <tr>
    <td class=top colspan=2>
      <p><?php echo $room->getName(); ?></p>
    </td><!--   e: top   -->
  </tr>
  <tr>
    <td class=theme>
      <div id=new_theme>
        <p class=new_preview>Новая тема</p>
      </div><!--   e: #new_theme   -->
      <a href="../../xroom/xRoom_uRoom/xRoom_uRoom.htm"><p class=old>Последняя тема</p>
        <p class=date>03.02.11</p>
      </a>
      <a href="#"><p class=old>Предпоследняя тема</p>
        <p class=date>02.02.11</p>
      </a>
      <a href="#"><p class=old>     ...    </p>
        <p class=date>xx,xx,11</p>
      </a>
      <a href="#"><p class=old>Первая тема</p>
        <p class=date>01.02.11</p>
      </a>
    </td><!--   e:  td class=theme -->
    <td class=comms_preview>
      <?php $topic = $form->getValues(); ?>
      <p class=theme_header><?php echo $topic['title'] ?></p>
      <div id=comm>
        <div id=user>
          <a href="#">
            <p class=login><?php echo $user->getLogin(); ?></p>
          </a>
          <img src="<?php echo $user->getUserpicFullPath(); ?>" border="0" alt="" />
        </div><!--   e: #user   -->
        <div id=text>
          <p class=text>
            <?php echo $topic['post']['content']; ?>
          </p>
        </div><!--   e: #text   -->
        <p class=credo><?php echo $user->getConstMsgForum(); ?></p>
      </div><!--   e: #comm   -->
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
      <form method="post" action="<?php echo url_for('room_topic_create', $room); ?>">
        <?php echo $form->renderHiddenFields(); ?>
        <?php echo $form['title']->render(array('type'=>'hidden')); ?>
        <?php echo $form['post']['content']->render(array('style'=>'display:none;')); ?>
        <input class="button_back" name="prevSubmitAct" type="submit" value="Назад">
        <input class="button_fwd" name="submitAct" type="submit" value="Ok">
      </form>
      
    </td>
  </tr>
</table><!--   e: #room   -->