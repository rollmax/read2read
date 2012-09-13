<tr id="changeResume" class=w>
  <td class=left><p><?php echo $user->getResumeText(); ?></p></td>
  <td class=right><a onclick="account.getResumeText('<?php echo url_for('profile_p_user_cv_resume'); ?>')"><p>Изменить</p></a></td>
</tr>