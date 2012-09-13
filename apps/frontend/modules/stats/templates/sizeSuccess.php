<?php slot('currentPage', 'profile_p_stats_size') ?>
<?php include_partial('stats/headBlock') ?>

<table id=stat_data_sale cellpadding="0" cellspacing="1">
  <tr class=w>
    <td class=left><p>Расчетный период</p></td>
    <td><p class=acctime><?php echo $period->getMonthString() ?></p></td>
    <td class=SALES><p>k знаков</p></td>
  </tr>
  
  <?php $count = count($top); ?>
  <?php if ($count == 0): ?>
      <tr class=y>
        <td class=left><p>5 самых больших статей</p></td>
        <td class=work><p>&nbsp;Нет данных</p></td>
        <td class=sales>&nbsp;</td>
      </tr>
  <?php else:?>
    <?php foreach ( $top as $i => $article):?>
      <tr class=y>
      <?php if ($i == 0): ?>
        <td class=left rowspan="<?php echo $count?>"><p>5 самых больших статей</p></td>
      <?php endif;?>  
        <td class=work>
          <a href="<?php echo url_for('article_by_categories', $article) ?>">
            <p class=left><?php echo $article->getTitleEn()?></p>
            <p class=right><?php echo $article->getTitleRu()?></p>
          </a>  
        </td>
        <td class=sales><p><?php echo $article->getLettersK()/1000; ?></p></td>
      </tr>      
    <?php endforeach;?>
  <?php endif;?>
  
  <?php $count = count($worse); ?>
  <?php if ($count == 0): ?>
      <tr class="g">
        <td class=left><p>5 самых маленьких статей</p></td>
        <td class=work><p>&nbsp;Нет данных</p></td>
        <td class=sales>&nbsp;</td>
      </tr>
  <?php else:?>
    <?php foreach ( $worse as $i => $article):?>
      <tr class="g">
      <?php if ($i == 0): ?>
        <td class=left rowspan="<?php echo $count?>"><p>5 самых маленьких статей</p></td>
      <?php endif;?>  
        <td class=work>
          <a href="<?php echo url_for('article_by_categories', $article) ?>">
            <p class=left><?php echo $article->getTitleEn()?></p>
            <p class=right><?php echo $article->getTitleRu()?></p>
          </a>
        </td>
        <td class=sales><p><?php echo $article->getLettersK()/1000;?></p></td>
      </tr>      
    <?php endforeach;?>
  <?php endif;?>

</table>
