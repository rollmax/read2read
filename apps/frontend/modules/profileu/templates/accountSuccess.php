<?php slot('currentPage', 'profile_u_account') ?>
<?php include_partial('profileu/profMenu') ?>
<table id=count_data  cellpadding="0" cellspacing="1">
  <tr class=w id="balance">
    <td class=left>
      <p class=ok>Сумма на счету</p>
    </td>
    <td class=center>
      <p><?php echo $user->getBalans(); ?></p>
    </td>
    <td class=right>
      <a onclick="account.get('balance', '<?php echo url_for('profile_u_ajax_edit', array('type'=>'balance')); ?>');">
      <p>Пополнить счет</p>
    </a>
    </td>
  </tr>
</table>