<?php get_partial('headerSettings') ?>

<?php slot('title_page', 'Home - Главная') ?>
<?php slot('menu_part_1', '<td class="act"><p class="ok">Контакты</p></td>') ?>
<?php slot('currentPage', 'contact') ?>
<div id=mdl>

    <div id=left>
<p class=h_rules>Правила</p>
<hr>
<a class=trans href="<?php echo url_for('static_page', array('url'=>'reader-rules')); ?>">Читателям</a>
<a class=trans href="<?php echo url_for('static_page', array('url'=>'translator-rules')); ?>">Переводчикам</a>
    </div><!-- e: left  -->  

  <div id=center>
    <?php echo $page->getRawValue()->getContent(); ?>
  </div>
  <?php $registerRoute = 'registration_u'; ?>
  <?php include_partial('rightSide', array('registerRoute' => $registerRoute)); ?>
</div>