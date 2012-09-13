<?php slot('currentPage', 'profile_p_user_cv') ?>
<?php include_partial('profilep/profMenu') ?>

<table id=resume_data  cellpadding="0" cellspacing="0">
  <tr id="changeResume" class=w>
    <td class=left><p><?php echo $user->getResumeText(); ?></p></td>
    <td class=right><a onclick="account.getResumeText('<?php echo url_for('profile_p_user_cv_resume'); ?>')"><p>Резюме - Изменить</p></a></td>
  </tr>
  <tr class=b id="changeAvatar">
    <td class=left>
      <?php echo ($user->getAvatarFullPath()) ? '<img src="'.$user->getAvatarFullPath().'" border="0" alt="">' : ''; ?>
    </td>
    <td class=right><a onclick="account.getAvatar('<?php echo url_for('profile_p_user_cv_avatar'); ?>');"><p>Фотография - Изменить</p></a></td>
  </tr>
</table>
