<td class=left>
  <form method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form[$fieldName]->renderError(); ?></p>
    <p><?php echo $form[$fieldName]->render(); ?></p>
  </form>
</td>
<td class=right>
  <a onclick="account.change('<?php echo $cssId; ?>', '<?php echo url_for('profile_u_ajax_update', array('type'=>$type)); ?>');">
    <p>Изменить</p>
  </a>
</td>