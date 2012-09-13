<td class="left">
  <p>Тарифный план</p>
</td>
<td class="center">
  <form method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <?php echo $form['tariff_change']->renderError(); ?>
    <?php echo $form['tariff_change']->render(); ?>
  </form>
</td>
<td class="right">
  <input type="button" onclick="account.changeTariff('<?php echo url_for('profile_p_update_tariff'); ?>')" value="Изменить" />
</td>