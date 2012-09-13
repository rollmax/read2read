<td class=left>
  <p><?php echo $titleName; ?></p>
</td>
<td class=center>
  <p><?php echo $value; ?></p>
</td>
<td class=right>
  <a onclick="account.get('<?php echo $cssId; ?>', '<?php echo url_for('profile_p_edit', array('fieldname'=>$fieldName)); ?>');">
    <p><?php echo (isset($btnText)) ? $btnText : 'Изменить'; ?></p>
  </a>
</td>