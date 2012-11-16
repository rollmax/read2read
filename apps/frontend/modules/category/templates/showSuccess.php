<?php slot('currentPage', 'homepage') ?>

<?php slot('page_keywords') ?>
<?php echo $currentCategory->getPageKeywords() ?>
<?php end_slot('page_keywords') ?>

<?php slot('page_description') ?>
<?php echo $currentCategory->getPageDescription() ?>
<?php end_slot('page_description') ?>

<?php slot('title_page') ?>
<?php echo $currentCategory->getNameEn().' - '.$currentCategory->getNameRu() ?>
<?php end_slot('title_page') ?>

<?php if(!$sf_user->isAuthenticated()) : ?>
  <?php slot('menu_part_1', '<td class="act_noreg"><a href="'.url_for('@homepage').'"><p>Home - Главная</p></a></td>') ?>
<?php endif; ?>

  <table id=parts border="0" cellpadding="0" cellspacing="1">

    <tr>
      <td></td>
    </tr>
  <?php foreach ($categories as $category): ?>
    <tr>
      <td>
      <?php if ($category->getNameEn() == "For Fun") : ?>
        <a href="<?php echo url_for('articles_category',$category); ?>">
          <p class="lfree"><?php echo $category->getNameEn(); ?>&nbsp;<span>Free !!!</span></p>
          <p class="rfree"><span>Бесплатно !!!</span><?php echo $category->getNameRu() ?></p>
        </a>
      <?php else : ?>
          <a href="<?php echo url_for('articles_category', $category); ?>">
            <p class="left"><?php echo $category->getNameEn(); ?></p>
            <p class="right"><?php echo $category->getNameRu() ?></p>
          </a>
      <?php endif; ?>
        </td>
      </tr>
  <?php endforeach; ?>
  <tr>
    <td>
    </td>
  </tr>
</table>
<div id="mdl_i">
  <table id=items border="0" cellpadding="0" cellspacing="0">
    <tr class=bl>
      <td>
        <p class=le>Title</p>
        <p class=price>Цена</p>
        <p class=kzn>k зн.</p>
        <p class=ri>Название</p>

      </td>
    </tr>
    <?php $i = 0; ?>
    <?php foreach($pager->getResults() as $article): ?>
    <tr class="<?php echo ($i%2 == 1) ? 'b' : ''; ?>">
      <td>
        <a href="<?php echo url_for('article_by_categories',$article); ?>">
          <p class="left"><?php echo $article->getTitleEn(); ?></p>
          <p class=price>
            <?php if($article->getCategory()->getIsFree()) : ?>
              0
            <?php else : ?>
              <?php echo $article->getPrice(); ?>
            <?php endif; ?>
          </p>
          <p class=kzn><?php echo $article->getLettersK()/1000; ?></p>
          <p class=right><?php echo $article->getTitleRu(); ?></p>
        </a>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    <?php include_partial('pager', array('pager'=>$pager, 'url' => url_for('articles_category',$currentCategory))); ?>
  </table>
</div><!-- ends mdl_i -->

