<?php slot('currentPage', 'profile_p_stats_quality') ?>
<?php include_partial('stats/headBlock') ?>

<table id="stat_data_quality" cellpadding="0" cellspacing="1">
  <tr class=w>
    <td class=left><p>&nbsp;</p></td>
    <td><p class=acctime>&nbsp;</p></td>
    <td class="qq"><p class=article>Статья<p class=sep>/</p><p class=trans>Перевод</p></td>
  </tr>
  
  <?php $count = count($top); ?>
  <?php if ($count == 0): ?>
      <tr class=y>
        <td class=left><p>5 лучших статей по оценке читателей</p></td>
        <td class=work><p>&nbsp;Нет данных</p></td>
        <td class=sales>&nbsp;</td>
      </tr>
  <?php else:?>
    <?php foreach ( $top as $i => $article):?>
      <tr class=y>
      <?php if ($i == 0): ?>
        <td class=left rowspan="<?php echo $count?>"><p>5 лучших статей по оценке читателей</p></td>
      <?php endif;?>  
        <td class=work>
          <a href="<?php echo url_for('article_by_categories', $article) ?>">
            <p class=left><?php echo $article->getTitleEn()?></p>
            <p class=right><?php echo $article->getTitleRu()?></p>
          </a>  
        </td>
        <td class="qq"><p class="article"><?php echo $article->getContRate(); ?></p><p class="sep">/</p><p class="trans"><?php echo $article->getTransRate(); ?></p></td>
      </tr>      
    <?php endforeach;?>
  <?php endif;?>
  
  <?php $count = count($top_r2r); ?>
  <?php if($count == 0): ?>
      <tr class="g">
        <td class=left><p>5 лучший статей по оценке Read2Read</p></td>
        <td class=work><p>&nbsp;Нет данных</p></td>
        <td class=sales>&nbsp;</td>
      </tr>
  <?php else:?>
    <?php foreach($top_r2r as $i => $article):?>
      <tr class="g">
      <?php if ($i == 0): ?>
        <td class=left rowspan="<?php echo $count?>"><p>5 лучший статей по оценке Read2Read</p></td>
      <?php endif;?>  
        <td class=work>
          <a href="<?php echo url_for('article_by_categories', $article) ?>">
            <p class=left><?php echo $article->getTitleEn()?></p>
            <p class=right><?php echo $article->getTitleRu()?></p>
          </a>
        </td>
        <td class="qq"><p class="article"><?php echo $article->getR2rContRate(); ?></p><p class="sep">/</p><p class="trans"><?php echo $article->getR2rTransRate(); ?></p></td>
      </tr>      
    <?php endforeach;?>
  <?php endif;?>

</table>
