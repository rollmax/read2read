<td class=left>
  <p>Фамилия</p>
</td>
<td class=center>
  <form action="" method="post">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form['first_name']->render(); ?></p>
  </form>
</td>
<td class=right>
  <input type="button" onclick="account.changeFirstName('<?php echo url_for('profile_p_first_name_update'); ?>')" value="Изменить" />
</td>