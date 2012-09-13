<tr class=b>
  <td class=left colspan="2">
    <form method="post" action="<?php echo url_for('profile_p_user_cv_avatar_update'); ?>" enctype="multipart/form-data">
      <?php echo $form->renderHiddenFields(); ?>
      <?php echo $form['avatar']->renderError(); ?>
      <?php echo $form['avatar']->render(); ?>
      <p style="margin-top:7px;">максимальный размер изображения 240х400 пикселей</p>
      <input type="submit" value="Изменить" style="float: right; margin-right: 110px;" />
    </form>
  </td>
</tr>