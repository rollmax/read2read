<td class=left>
  <p>Тарифный план</p>
</td>
<td class=center>
  <p><?php echo $user->getTariffString() ?></p>
  <?php if($user->getTariffChange() != 'none'): ?>
  <p>(Будет изменен на "<?php echo $user->getTariffChangeString(); ?>")</p>
  <?php endif; ?>
</td>
<td class=right>
  <a onclick="account.getTariff('<?php echo url_for('profile_p_tarif');?>');">
    <p>Изменить</p>
  </a>
</td>