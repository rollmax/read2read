<td class="left"><p><?php echo $titleName; ?></p></td>
<td class=center colspan="2">
  <form method="post" action="<?php echo url_for($routeName); ?>" enctype="multipart/form-data">
    <?php echo $form->renderHiddenFields(); ?>
    <?php echo $form[$fieldName]->renderError(); ?>
    <?php echo $form[$fieldName]->render(); ?>
    <input type="submit" value="Изменить" style="width:80px; margin-right: 40px;" />
  </form>
</td>