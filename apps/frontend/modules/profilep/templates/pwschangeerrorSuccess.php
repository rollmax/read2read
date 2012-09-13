<?php slot('currentPage', 'profile_p_user') ?>
<?php include_partial('profilep/profMenu') ?>
<table id=account_data  cellpadding="0" cellspacing="0">
  <tr class=w id="password">
    <td class=left>
      <p>&nbsp;</p>
    </td>
    <td class=center>
      <p>Введена не правильная картинка, попробуйте <b><a href="<?php echo url_for('profile_p_user');?>">еще раз</a></b></p>
    </td>
    <td class=right>&nbsp;</td>
  </tr>
</table>