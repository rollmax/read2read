<td class="left">
  <p>e-mail</p>
</td>
<td class="center">
  <form id="<?php echo $form->getObject()->getId(); ?>" method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form['email']->renderError(); ?></p>
    <?php echo $form['email']->render(); ?>
  </form>
</td>
<td class="right">
  <input type="button" onclick="account.changeEmail('<?php echo url_for('profile_p_update_email'); ?>')" value="Изменить" />
</td>
