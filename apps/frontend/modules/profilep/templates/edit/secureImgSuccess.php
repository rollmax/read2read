<td class=left>
  <p class=chng_wal><?php echo $titleName; ?></p>
</td>
<td class=center>
  <p class=open_check_pic>Откройте контрольное изображение</p>
  <form method="post" action="<?php echo url_for('profile_p_invoice') ?>" enctype="multipart/form-data">
    <?php echo $form->renderHiddenFields(); ?>
    <?php if(isset($error_img)): ?>
    <p class="fail">Открытое изображение не верно</p>
    <?php endif; ?>
    <p><?php echo $form['img_file_name']->render(); ?></p>
    <p><input type="submit" value="Изменить"></p>
  </form>
</td>
<td class=right>
  &nbsp;
</td>