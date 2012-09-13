<td class=left>
  <p>тел.</p>
</td>
<td class=center>
  <form method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form['phone']->renderError(); ?></p>
    <p><?php echo $form['phone']->render(); ?></p>
  </form>
</td>
<td class=right>
  <input type="button" value="Изменить" onclick="account.changePhone('<?php echo url_for('profile_p_phone_update'); ?>');" />
</td>