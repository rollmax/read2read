<?php
$iMonth = $oPeriod->getMonthNumeric();
$iYear  = $oPeriod->getYear();
$iDay   = 1;
$iLastDay = date('t', strtotime($iYear.'/'.$iMonth.'/1'));

$iDays = cal_days_in_month(CAL_GREGORIAN, $iMonth, $iYear);
$iWeekDay = date("N", mktime(0,0,0,$iDay,$iMonth,$iYear));
$iWeeks = ceil(($iDays + $iWeekDay) / 7);

$iFirstWeekNumber = date("W", mktime(0, 0, 0, 1, 1, $iYear));
?>

<?php for($i = 1; $i <= $iWeeks; $i++): ?>
<tr class=y>
<!--  week number-->
  <td class=left>
    <p><?php echo $i; ?>-я неделя</p>
  </td>
<!--  end week number-->
  <?php for ($k = 1; $k <= 7; $k++): ?>
  <td>
  <?php if($i == 1 && date("w", strtotime($iYear.'/'.$iMonth.'/1')) <= $k): ?>
    <?php include_partial('stats_cell', array('iDate' => $iDay, 'aStatistics' => $aStatistics)); ?>
  <?php $iDay++; ?>
  <?php elseif($i != 1 && $i != $iWeeks): ?>
    <?php include_partial('stats_cell', array('iDate' => $iDay, 'aStatistics' => $aStatistics)); ?>
  <?php $iDay++; ?>
  <?php elseif ($i == $iWeeks && date("w", strtotime($iYear.'/'.$iMonth.'/'.$iLastDay)) >= $k): ?>
    <?php include_partial('stats_cell', array('iDate' => $iDay, 'aStatistics' => $aStatistics)); ?>
  <?php $iDay++; ?>
  <?php endif; ?>
  </td>
  <?php endfor; ?>
</tr>
<?php endfor; ?>