<?php get_component('page', 'headerSettings') ?>

<?php if($sf_user->isAnonymous()): ?>
    <?php slot('currentPage', 'homepage') ?>
    <?php use_stylesheet('home.css') ?>
<?php endif; ?>

<?php if($sf_user->isAuthenticated()): ?>
<?php slot('title_page') ?>
Account Status - Состояние аккаунта
<?php end_slot('title_page') ?>
<?php endif; ?>

<table id=parts border="0" cellpadding="0" cellspacing="1">

	   <tr>
         <td></td>
    </tr>
    <?php foreach ($categories as $category): ?>
      <tr>
        <td>
        <?php if($category->getNameEn() == "For Fun") : ?>
          <a href="<?php echo url_for('articles_category',$category); ?>">
            <p class="lfree"><?php echo $category->getNameEn(); ?>&nbsp;<span>Free !!!</span></p>
            <p class="rfree"><span>Бесплатно !!!</span><?php echo $category->getNameRu() ?></p>
          </a>
        <?php else : ?>
          <a href="<?php echo url_for('articles_category',$category); ?>">
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

<?php if($sf_user->isAnonymous()): ?>

<div id=mdl1>
<table id=for border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class=mdlleft><?php echo Setting::getValueByName('indexText') ?></td>
    <td class=mdlright>
        <?php include_component('auth','loginForm') ?>
    </td><!--        mdllrght  end                 -->
  </tr>
</table>
</div><!--          mdl1  end                 -->
<?php endif; ?>

<?php if(!$sf_user->isAnonymous()): ?>
  <?php $user = $sf_user->getGuardUser();?>
  <?php if($user->getUtype() == 'puser'): ?>
    <?php include_component('profilep','accountState') ?>
  <?php else: ?>
    <?php include_component('profileu','accountState') ?>
  <?php endif; ?>
<?php endif; ?>