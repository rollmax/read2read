<?php foreach($posts as $post): ?>
<div id=comm>
  <p class=post_date>
    <?php echo $post->getCreatedAt(); ?>
    <?php if($post->getIdUser() == $user->getId()): ?>
    <span style="float: right;">
      <a class="edit" href="<?php echo url_for('room_topic_post_edit', $post); ?>">Изменить</a>
      <a class="delete" href="<?php echo url_for('room_topic_post_delete', $post); ?>">Удалить</a>
    </span>
    <?php endif; ?>
  </p>
  <div id=user>
    <a href="#">
      <p class=login><?php echo $post->getUser()->getLogin(); ?></p>
    </a>
    <img src="<?php echo $post->getUser()->getUserpicFullPath(); ?>" border="0" alt="" />
  </div><!--   e: #user   -->
  <div id=text>
    <p class=text><?php echo $post->getContent(); ?></p>
  </div><!--   e: #text   -->
</div><!--   e: #comm   -->
<p class=credo><?php echo $post->getUser()->getConstMsgForum(); ?></p>
<?php endforeach; ?>