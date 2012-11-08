<td class=left xmlns="http://www.w3.org/1999/html">
  <p>Сайт</p>
</td>
<td class=center>
  <p><?php echo $user->getSite() ?></p>
</td>
<td class=right>
  <a onclick="account.getSite('<?php echo url_for('profile_p_site'); ?>');">
    <p>Изменить</p>
  </a>
</td>