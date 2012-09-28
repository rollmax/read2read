<?php slot('currentPage', 'profile_u_user') ?>
<?php slot('title_page', 'Personal room - Личный кабинет') ?>
<?php include_partial('profileu/profMenu') ?>
<table id=account_data  cellpadding="0" cellspacing="0">
  <tr class=w id="password">
    <td class=left>
      <p>&nbsp;</p>
    </td>
    <td class=center>
      <p>Введена не правильная картинка, попробуйте <b><a href="<?php echo url_for('profile_u_user');?>">еще раз</a></b></p>
    </td>
    <td class=right>&nbsp;</td>
  </tr>
</table>