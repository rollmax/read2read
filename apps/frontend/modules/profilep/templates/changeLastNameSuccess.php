<td class=left>
  <p>Фамилия</p>
</td>
<td class=center>
  <form action="" method="post">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form['last_name']->render(); ?></p>
  </form>
</td>
<td class=right>
  <input type="button" onclick="account.changeLastName('<?php echo url_for('profile_p_last_name_update'); ?>')" value="Изменить" />
</td>