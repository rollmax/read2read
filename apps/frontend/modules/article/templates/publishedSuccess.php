<?php slot('currentPage', 'article_published') ?>
<?php include_partial('article/headBlock') ?>

<table id=wrks_data  cellpadding="0" cellspacing="0">
  <tr class=w>
    <td colspan=7>
      <p class=h>Опубликованные работы</p>
    </td>
  </tr>
  <tr class=y>
    <td>
      <p>Текущий период</p>
    </td>
    <td  colspan=6>
      <p>Январь</p>
    </td>
  </tr>
  <tr class=b>
    <td class=title><p>Работы</p></td>
    <td><p>k знаков</p></td>
    <td><p>Продажи</p></td>
    <td class=sum_of_sales><p>Сумма по<br> продажам</p></td>
    <td><p>Дата <br>публикации</p></td>
    <td class=part><p>Раздел</p></td>
    <td><p>&nbsp;</p></td>
  </tr>

  <?php foreach ($pager->getResults() as $article) : ?>
    <tr class="w">
      <td class="title">
        <p class="left"><?php echo $article->getTitleEn() ?></p>
        <p class="right"><?php echo $article->getTitleRu() ?></p>
      </td>
      <td><p><?php echo $article->getLettersK() / 1000 ?></p></td>
      <td><p>0</p></td>
      <td class="sum_of_sales"><p>0.00</p></td>
      <td><p><?php echo $article->getPubDate() ?></p></td>
      <td class=part>
        <p><?php echo $article->getCategory()->getNameEn() ?></p>
        <p><?php echo $article->getCategory()->getNameRu() ?></p>
      </td>
      <td class=del>
      <?php if ($article->getToDelete()) : ?>
        <p class=deleted>Удалено</p>
      <?php else: ?>
      <?php
          echo link_to('<p>Удалить</p>', 'article/delete?id=' . $article->getId(),
                  array('method' => 'delete', 'confirm' => 'Удалить работу?')
          )
      ?>
<?php endif; ?>
        </td>
      </tr>
<?php endforeach; ?>
<?php include_partial('pager', array('pager'=>$pager, 'url'=>url_for('article_published'))); ?>
</table>