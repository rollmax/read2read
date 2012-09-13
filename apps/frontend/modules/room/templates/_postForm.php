<p class=adcomm>Добавить комментарий</p>
<div id=input>
  <form action="<?php echo url_for('room_topic_post_create', $topic); ?>" method="post">
  <?php echo $form->renderHiddenFields(); ?>
  <?php echo $form['content']->renderError(); ?>
  <?php echo $form['content']->render(array('rows'=>'8', 'cols'=>'80')); ?>
  <input class=submit type="submit" value="Добавить" />
  </form>
</div><!--   e: #input   -->