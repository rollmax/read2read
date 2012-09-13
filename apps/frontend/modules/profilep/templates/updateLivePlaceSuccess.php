<td class=left>
  <p>Место проживания</p>
</td>
<td class=center>
  <p><?php echo $user->getLivePlace(); ?></p>
</td>
<td class=right>
  <a onclick="account.getLivePlace('<?php echo url_for('profile_p_live_place'); ?>')">
    <p>Изменить</p>
  </a>
</td>