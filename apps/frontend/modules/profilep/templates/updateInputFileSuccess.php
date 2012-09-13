<?php slot('currentPage', 'profile_p_user_cv') ?>
<?php include_partial('profilep/profMenu') ?>

<table id=resume_data  cellpadding="0" cellspacing="0">
  <tr id="changeResume" class=w>
    <td class=left><p><?php echo $user->getResumeText(); ?></p></td>
    <td class=right><a onclick="account.getResumeText('<?php echo url_for('profile_p_user_cv_resume'); ?>')"><p>Изменить</p></a></td>
  </tr>
  <td class=left colspan="2">
    <form method="post" action="<?php echo url_for('profile_p_user_cv_avatar_update'); ?>" enctype="multipart/form-data">
      <?php echo $form->renderHiddenFields(); ?>
      <?php echo $form['avatar']->renderError(); ?>
      <?php echo $form['avatar']->render(); ?>
      <p style="margin-top:7px;">максимальный размер изображения 240х400 пикселей</p>
      <input type="submit" value="Изменить" style="float: right; margin-right: 110px;" />
    </form>
  </td>
</table>
