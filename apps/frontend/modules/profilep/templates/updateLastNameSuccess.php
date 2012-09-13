<td class=left>
  <p>Фамилия</p>
</td>
<td class=center>
  <p><?php echo $user->getLastName(); ?>
</td>
<td class=right>
  <a onclick="account.getLastName('<?php echo url_for('profile_p_last_name'); ?>')">
    <p>Изменить</p>
  </a>
</td>