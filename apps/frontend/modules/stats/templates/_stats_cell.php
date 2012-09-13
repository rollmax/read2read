<?php $sMethod = 'get'.$iDate.'Login'; ?>
<p class=day_data_users><?php echo $aStatistics->{$sMethod}(); ?></p>
<?php $sMethod = 'get'.$iDate.'Buy'; ?> 
<p class=day_data_buyers><?php echo $aStatistics->{$sMethod}(); ?></p>