<td class=left>
  <p>Имя</p>
</td>
<td class=center>
  <p><?php echo $user->getFirstName(); ?></p>
</td>
<td class=right>
  <a onclick="account.getFirstName('<?php echo url_for('profile_p_first_name'); ?>')">
    <p>Изменить</p>
  </a>
</td>