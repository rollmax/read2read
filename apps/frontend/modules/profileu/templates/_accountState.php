<div id=mdl1>
<?php $user = $sf_user->getGuardUser();?>
<?php if($user->getIsBlocked()) : ?>
  <div id="status_h"><p class="stop">Действие аккаунта остановлено</p></div>
<?php else: ?>
  <div id="status_h"><p class="ok">OK</p></div>   
<?php endif; ?>

<table id=status cellpadding="0">	
  <tr class=w>
    <td class=left><p>1k знаков</p></td>
		<td class=right><p><?php echo $settings->getPrice_1k() ?></p></td>
  </tr>
	<tr class=b>
    <td class=left><p>На счету</p></td>
    <td class=right><p 
<?php if($user->getIsBlocked()) : ?>
 class="stop" 
<?php endif; ?>
    ><?php echo $user->getBalans() ?></p></td>
  </tr>
</table>

</div>
