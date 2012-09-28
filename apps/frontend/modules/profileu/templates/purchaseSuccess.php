<?php slot('currentPage', 'profile_u_purchase') ?>
<?php slot('title_page', 'Personal room - Личный кабинет') ?>
<?php include_partial('profileu/profMenu') ?>
<table id=buys_data  cellpadding="0" cellspacing="0">
  <?php if(!count($contentPurchaseCategories) > 0): ?>
  <tr class="w">
    <td class="no_buys">
      <p>
        У вас нет покупок
      </p>
    </td>
  </tr>
  <?php else: ?>
  <tr class=b>
    <td colspan=2>
      <form method="get" action="">
        <select name="category" onchange="this.form.submit();">
          <?php foreach($contentPurchaseCategories as $purchase): ?>
            <option value="<?php echo $purchase->getCategory()->getId(); ?>" <?php echo ($purchase->getCategory()->getId() == $categoryId) ? 'selected' : ''; ?>>
              <?php echo $purchase->getCategory()->getNameLanguages(); ?></option>
          <?php endforeach; ?>
        </select>
      </form>
    </td>
  </tr>
    <?php if ($pager->count() == 0): ?>
    <tr class="w">
      <td class="no_buys">
        <p>
          У вас нет покупок в этом разделе
        </p>
      </td>
    </tr>
    <?php else: ?>
    <?php foreach($pager->getResults() as $purchase): ?>
      <tr class=w>
        <td class=left>
          <a href="<?php echo url_for('article_by_categories', $purchase->getContent()); ?>">
            <p class=left><?php echo $purchase->getContent()->getTitleEn(); ?></p>
            <p class=right><?php echo $purchase->getContent()->getTitleRu(); ?></p>
          </a>
        </td>
        <td class=right>

          <a href="<?php echo url_for('profile_u_purchase_remove', $purchase); ?>">
            <p>Удалить</p>
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    <?php include_partial('pager', array('pager'=>$pager, 'url'=>url_for('profile_u_purchase').'?category='.$categoryId)); ?>
    <?php endif; ?>

  <?php endif; ?>
</table>