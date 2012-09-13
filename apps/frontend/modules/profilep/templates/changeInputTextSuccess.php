<td class=left>
  <p><?php echo $titleName; ?></p>
</td>
<td class=center>
  <form method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form[$fieldName]->renderError(); ?></p>
    <p><?php echo $form[$fieldName]->render(); ?></p>
  </form>
</td>
<td class=right>
  <input type="button" value="Изменить" onclick="account.change('<?php echo $cssId; ?>', '<?php echo url_for($routeName); ?>');" />
</td>