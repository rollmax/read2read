<?php slot('currentPage', 'profile_p_stats_interpreter') ?>
<?php include_partial('stats/headBlock') ?>

<table id=stat_data_trans  cellpadding="0" cellspacing="1">
  <tr class=w>
    <td class=left><p>Расчетный период</p></td>
    <td class=trans><p class=acctime><?php echo $period->getMonthString() ?></p></td>
    <td class=sales><p>Продажи</p></td>
  </tr>
  
  <?php $count = count($top); ?>
  <?php if ($count == 0): ?>
      <tr class=y>
        <td class=left><p>5 самых продаваемых на сайте</p></td>
        <td class="trans"><p>&nbsp;Нет данных</p></td>
        <td class=sales>&nbsp;</td>
      </tr>
  <?php else:?>
    <?php foreach ( $top as $i => $data):?>
      <tr class=y>
      <?php if ($i == 0): ?>
        <td class=left rowspan="<?php echo $count?>"><p>5 самых продаваемых на сайте</p></td>
      <?php endif;?>  
        <td class=trans>
          <a onclick="resume.openResume('<?php echo url_for('user_p_resume_data', $data); ?>');">
            <p class=left><?php echo $data->getLogin()?></p>
          </a>  
        </td>
        <td class=sales><p><?php echo $data->getSells(); ?></p></td>
      </tr>
    <?php endforeach;?>
  <?php endif;?>

  <?php $count = count($top2); ?>
  <?php if ($count == 0): ?>
      <tr class="g">
        <td class=left><p>5 самых продаваемых по разделам</p><p><?php include_partial('category_select_form', array('form' => $form, 'route' => 'profile_p_stats_interpreter')); ?></p></td>
        <td class="trans"><p>&nbsp;Нет данных</p></td>
        <td class=sales>&nbsp;</td>
      </tr>
  <?php else:?>
    <?php foreach ( $top2 as $i => $data):?>
      <tr class="g">
      <?php if ($i == 0): ?>
        <td class=left rowspan="<?php echo $count; ?>"><p>5 самых продаваемых по разделам</p><p><?php include_partial('category_select_form', array('form' => $form, 'route' => 'profile_p_stats_interpreter')); ?></p></td>
      <?php endif;?>  
        <td class="trans">
          <a onclick="resume.openResume('<?php echo url_for('user_p_resume_data', $data); ?>');">
            <p class=left><?php echo $data->getLogin()?></p>
          </a>  
        </td>
        <td class=sales><p><?php echo $data->getSells(); ?></p></td>
      </tr>
    <?php endforeach;?>
  <?php endif;?>
</table>
<div id="close" style="display:none;">
  <a class="cls_btn na"><p><img src="/images/close_v.png" alt="" /></p></a>
</div>
