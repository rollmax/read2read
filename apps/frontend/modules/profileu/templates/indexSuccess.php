<?php slot('currentPage', 'profile_u_user') ?>
<?php include_partial('profileu/profMenu') ?>
<?php slot('title_page', 'Personal room - Личный кабинет') ?>
<table id=account_data  cellpadding="0" cellspacing="0">
  <tr class=w id="password">
    <td class=left>
      <p>Пароль</p>
    </td>
    <td class=center>
      <p>*******</p>
    </td>
    <td class=right>
      <a onclick="account.get('password', '<?php echo url_for('profile_u_ajax_edit', array('type'=>'password')); ?>')">
        <p>Изменить</p>
      </a>
    </td>
  </tr>
  <tr class=b id="email">
    <td class=left height="38">
      <p>e-mail</p>
    </td>
    <td class=center height="38">
      <p><?php echo $user->getEmail(); ?></p>
    </td>
    <td class=right height="38">
      <a onclick="account.get('email', '<?php echo url_for('profile_u_ajax_edit', array('type'=>'email')); ?>')">
        <p>Изменить</p>
      </a>
    </td>
  </tr>
</table>