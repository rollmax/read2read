<td class="left">
  <p class="wr">Откройте контрольное изображение, полученное при регистрации</p>
</td>
<td class="center">
  <form method="post" action="<?php echo url_for('profile_p_psw_change') ?>" enctype="multipart/form-data">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form['img_file_name']->renderError(); ?></p>
    <p><?php echo $form['img_file_name']->render(); ?></p>
    <p><input type="submit" value="Изменить"></p>
  </form>
</td>
<td class="right">&nbsp;</td>