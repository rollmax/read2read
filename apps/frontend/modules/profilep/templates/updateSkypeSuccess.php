<td class=left>
  <p>Скайп</p>
</td>
<td class=center>
  <p><?php echo $user->getSkype(); ?></p>
</td>
<td class=right>
  <a onclick="account.getSkype('<?php echo url_for('profile_p_skype'); ?>');">
    <p>Изменить</p>
  </a>
</td>