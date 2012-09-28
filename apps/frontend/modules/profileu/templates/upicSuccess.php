<?php slot('currentPage', 'profile_u_upic') ?>
<?php slot('title_page', 'Personal room - Личный кабинет') ?>
<?php include_partial('profileu/profMenu') ?>
<table id=upic_data  cellpadding="0" cellspacing="0">
  <tr class=w id="userpic">
    <td class=left>
      <?php echo ($user->getUserpicFullPath()) ? '<img src="'.$user->getUserpicFullPath().'" border="0" alt="">' : ''; ?>
    </td>
    <td class=right>
      <a onclick="account.get('userpic', '<?php echo url_for('profile_u_ajax_edit', array('type'=>'userpic')); ?>');">
        <p>Изменить</p>
      </a>
    </td>
  </tr>
  <tr class=b id="const-msg">
    <td class=left>
      <p><?php echo $user->getConstMsgUserPanel(); ?></p>
    </td>
    <td class=right>
      <a onclick="account.get('const-msg', '<?php echo url_for('profile_u_ajax_edit', array('type'=>'constMsg')); ?>');">
        <p>Изменить</p>
      </a>
    </td>
  </tr>
</table>