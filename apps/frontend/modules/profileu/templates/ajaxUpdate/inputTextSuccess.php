<td class=left>
  <p><?php echo $value ?></p>
</td>
<td class=right>
  <a onclick="account.get('<?php echo $cssId; ?>', '<?php echo url_for('profile_u_ajax_edit', array('type'=>$type)); ?>');">
    <p>Изменить</p>
  </a>
</td>