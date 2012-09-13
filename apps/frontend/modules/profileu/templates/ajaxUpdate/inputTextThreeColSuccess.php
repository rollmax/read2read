<td class="left">
  <p><?php echo $titleName; ?></p>
</td>
<td class="center">
  <form method="post" action="">
    <p><?php echo $value ?></p>
  </form>
</td>
<td class="right">
  <a  onclick="account.get('<?php echo $cssId; ?>', '<?php echo url_for('profile_u_ajax_edit', array('type'=>$type)); ?>');">
    <p><?php echo (isset($btnText)) ? $btnText : 'Изменить'; ?></p>
  </a>
</td>
