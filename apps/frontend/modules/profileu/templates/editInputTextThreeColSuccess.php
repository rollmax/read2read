<td class="left">
  <p><?php echo $titleName; ?></p>
</td>
<td class="center">
  <form method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form[$fieldName]->renderError(); ?></p>
    <?php echo $form[$fieldName]->render(); ?>
  </form>
</td>
<td class="right">
  <input type="button" onclick="account.change('<?php echo $cssId; ?>', '<?php echo url_for('profile_u_ajax_update', array('type'=>$type)); ?>');" value="Изменить" />
</td>
