<td class=left>
  <p>Скайп</p>
</td>
<td class=center>
  <form method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form['skype']->renderError(); ?></p>
    <p><?php echo $form['skype']->render(); ?></p>
  </form>
</td>
<td class=right>
  <input type="button" value="Изменить" onclick="account.changeSkype('<?php echo url_for('profile_p_skype_update'); ?>');" />
</td>