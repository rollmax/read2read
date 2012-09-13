<td class=left>
  <p>Сайт</p>
</td>
<td class=center>
  <?php echo ($user->getSite() !== null) ? '<a href="'.$user->getSite().'" target="_blank"><p>'.$user->getSite().'</p></a>' : ''; ?>
</td>
<td class=right>
  <a onclick="account.getSite('<?php echo url_for('profile_p_site'); ?>');">
    <p>Изменить</p>
  </a>
</td>