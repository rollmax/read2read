<td class="left">
  <p>e-mail</p>
</td>
<td class="center">
  <p><?php echo $user->getEmail() ?></p>
</td>
<td class="right">
  <a onclick="account.getEmail('<?php echo url_for('profile_p_email'); ?>');">
    <p>Изменить</p>
  </a>
</td>