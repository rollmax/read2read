<?php slot('currentPage', 'profile_p_stats_visit') ?>
<?php include_partial('stats/headBlock') ?>

<table id=stat_data_visit cellpadding="0" cellspacing="1">
  <tr class=w>
    <td class=left><p>Расчетный период</p></td>
    <td colspan=7><p class=acctime><?php echo $period->getMonthString() ?></p></td>
  </tr>
  <tr class=b>
    <td class=h colspan=8><p>Сайт в целом (зарегистрированные пользователи / покупатели)</p></td>
  </tr>
  <tr class=w>
    <td class=left>
      <p>&nbsp;</p>
    </td>
    <td>
      <p class=day>Пн</p>
    </td>
    <td>
      <p class=day>Вт</p>
    </td>
    <td>
      <p class=day>Ср</p>
    </td>
    <td>
      <p class=day>Чт</p>
    </td>
    <td>
      <p class=day>Пт</p>
    </td>
    <td>
      <p class=day>Сб</p>
    </td>
    <td>
      <p class=day>Вс</p>
    </td>
  </tr>
  <?php include_partial('stats_table', array('aStatistics' => $aFullData, 'oPeriod'=>$period)); ?>
  <tr class=b>
    <td class=h colspan=8><p>По разделам (зарегистрированные пользователи / покупатели)</p></td>
  </tr>
  <tr class=w>
    <td class=left>
      <?php include_partial('category_select_form', array('form' => $form, 'route' => 'profile_p_stats_visit')); ?>
    </td>
    <td>
      <p class=day>Пн</p>
    </td>
    <td>
      <p class=day>Вт</p>
    </td>
    <td>
      <p class=day>Ср</p>
    </td>
    <td>
      <p class=day>Чт</p>
    </td>
    <td>
      <p class=day>Пт</p>
    </td>
    <td>
      <p class=day>Сб</p>
    </td><td>
      <p class=day>Вс</p>
    </td>
  </tr>
  <?php include_partial('stats_table', array('aStatistics' => $aDataByCategory, 'oPeriod'=>$period)); ?>
</table>
