<div id=mdl1> 
<?php $user = $sf_user->getGuardUser();?>
<?php if($user->getIsBlocked()) : ?>
  <div id="status_h"><p class="stop">Действие аккаунта остановлено</p></div>
<?php else: ?>
  <div id=status_h><p class="ok">OK</p></div>   
<?php endif; ?>

<table id=status cellpadding="0">	
<tr class=w>
        <td class=left>
			<p>Тарифный план</p>
        </td>
		<td class=right>
			<p><?php echo $user->getTariffString() ?></p>
        </td>
    </tr>
	
	<tr class=b>
        <td class=left>
			<p>Стоимость в день</p>
        </td>
		<td class=right>
			<p><?php echo $settings->getPriceByTariff($user->getTariff()) ?></p>
        </td>
    </tr>

    <tr class=w>
        <td class=left>
			<p>На счету пользования</p>
        </td>
		<td class=right><p 
<?php if($user->getIsBlocked()) : ?>
 class="stop" 
<?php endif; ?>
    ><?php echo $user->getBalans() ?></p></td>
    </tr>
</table>

</div>
