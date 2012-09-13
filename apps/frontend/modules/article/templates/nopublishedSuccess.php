<?php slot('currentPage', 'article_no_published') ?>
<?php include_partial('article/headBlock') ?>

<table id=wrks_data cellpadding="0" cellspacing="0">
  <tr class=w>
    <td colspan=7>
      <p class=h>Неопубликованные работы</p>
    </td>
  </tr>
  <tr class=b>
    <td>
      <p>Работы</p>
    </td>
    <td>
      <p>k знаков</p>
    </td>
    <td>
      <p>Дата<br>добавления</p>
    </td>
    <td class=part>
      <p>Раздел</p>
    </td>
    <td>
      <a href="<?php echo url_for('article/new') ?>"><p class=add>Добавить работу</p></a>
    </td>
  </tr>
  <?php foreach ($pager->getResults() as $article) : ?>
    <tr class=b>
      <td class="title">
        <p class="left"><?php echo $article->getTitleEn() ?></p>
        <p class="right"><?php echo $article->getTitleRu() ?></p>
      </td>
      <td><p><?php echo $article->getLettersK() / 1000 ?></p></td>
      <td><p><?php echo $article->getCreatedDate() ?></p></td>
      <td class="part">
        <p><?php echo $article->getCategory()->getNameEn() ?></p>
        <p><?php echo $article->getCategory()->getNameRu() ?></p>
      </td>
      <td>
        <a class=pub href="<?php echo url_for('article_publish', $article) ?>"><p>Публиковать</p></a>
        <a class=chg href="<?php echo url_for('article_edit', $article) ?>"><p>Изменить</p></a>
      <?php
      echo link_to('<p>Удалить</p>', 'article/delete?id=' . $article->getId(),
              array('method' => 'delete', 'confirm' => 'Удалить работу?', 'class' => 'del')
      )
      ?>
    </td>
  </tr>
<?php endforeach; ?>
  <?php echo include_partial('pager', array('pager'=>$pager, 'url'=>url_for('article_no_published'))); ?>
</table>
