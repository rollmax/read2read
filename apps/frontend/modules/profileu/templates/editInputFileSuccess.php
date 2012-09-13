<td class="left" colspan="2">
  <form method="post" action="<?php echo url_for('profile_u_ajax_update', array('type'=>$type)); ?>" enctype="multipart/form-data">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form[$fieldName]->renderError(); ?></p>
    <p><?php echo $form[$fieldName]->render(); ?></p>
    <input type="submit" value="Изменить" style="float:right; margin-right:75px;" />
  </form>
</td>