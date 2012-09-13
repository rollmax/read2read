<?php slot('currentPage', 'profile_p_stats') ?>
<?php include_partial('stats/headBlock') ?>

<table id=stat_data_sale cellpadding="0" cellspacing="1">
  <tr class=w>
    <td class=left><p>Расчетный период</p></td>
    <td><p class=acctime><?php echo $period->getMonthString() ?></p></td>
    <td class=SALES><p>Продаж</p></td>
  </tr>
  <?php $count = count($articles); ?>
  <?php if ($count == 0): ?>
      <tr class=y>
        <td class=left><p>5 самых продаваемых статей</p></td>
        <td class=work><p>&nbsp;Нет данных</p></td>
        <td class=sales><p></p></td>
      </tr>
  <?php else:?>
    <?php foreach ( $articles as $i => $article):?>
      <tr class=y>
      <?php if ($i == 0): ?>
        <td class=left rowspan="<?php echo $count?>"><p>5 самых продаваемых статей</p></td>
      <?php endif;?>  
        <td class=work>
          <a href="<?php echo url_for('article_by_categories', $article) ?>">
            <p class=left><?php echo $article->getTitleEn()?></p>
            <p class=right><?php echo $article->getTitleRu()?></p>
          </a>  
        </td>
        <td class=sales><p><?php echo $article->getPurchaseCnt(); ?></p></td>
      </tr>      
    <?php endforeach;?>
  <?php endif;?>
  
  <?php $count = count($categories); ?>
  <?php if ($count == 0): ?>
      <tr class="g">
        <td class=left><p>5 самых продаваемых разделов</p></td>
        <td class=work><p>&nbsp;Нет данных</p></td>
        <td class=sales><p></p></td>
      </tr>
  <?php else:?>
    <?php foreach ( $categories as $i => $category):?>
      <tr class="g">
      <?php if ($i == 0): ?>
        <td class=left rowspan="<?php echo $count?>"><p>5 самых продаваемых разделов</p></td>
      <?php endif;?>  
        <td class=work>
          <a href="#">
            <p class=left><?php echo $category->getNameEn()?></p>
            <p class=right><?php echo $category->getNameRu()?></p>
          </a>
        </td>
        <td class=sales><p><?php echo $category->getPurchaseCnt(); ?></p></td>
      </tr>      
    <?php endforeach;?>
  <?php endif;?>
</table>
