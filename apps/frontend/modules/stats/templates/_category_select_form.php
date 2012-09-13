<form method="post" name="category" action="<?php echo url_for($route); ?>">
  <?php echo $form->renderHiddenFields(); ?>
  <p><?php echo $form['id_category']->render(array('onchange' => 'document.category.submit();')); ?></p>
</form>