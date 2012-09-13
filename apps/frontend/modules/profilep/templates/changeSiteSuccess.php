<td class="left">
  <p>Сайт</p>
</td>
<td class="center">
  <form id="<?php echo $form->getObject()->getId(); ?>" method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form['site']->renderError(); ?></p>
    <?php echo $form['site']->render(); ?>
  </form>
</td>
<td class="right">
  <input type="button" onclick="account.changeSite('<?php echo url_for('profile_p_site_update'); ?>')" value="Изменить" />
</td>
