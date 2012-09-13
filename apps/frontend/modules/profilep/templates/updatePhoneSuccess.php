<td class=left>
  <p>тел.</p>
</td>
<td class=center>
  <p><?php echo $user->getPhone(); ?></p>
</td>
<td class=right>
  <a onclick="account.getPhone('<?php echo url_for('profile_p_phone'); ?>');">
    <p>Изменить</p>
  </a>
</td>