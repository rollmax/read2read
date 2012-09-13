<?php
$pages = array(
  'article' => array(
    'title' => 'Все работы'
  ),
  'article_published' => array(
    'title' => 'Опубликованные'
  ),
  'article_no_published' => array(
    'title' => 'Неопубликованные'
  ),
);
?>
  <div id=wrksto>
    <?php foreach ($pages as $route => $page): ?>
    <div id="wto">
      <?php if (get_slot('currentPage') === $route): ?>
        <p class="act"><?php echo $page['title'] ?></p>
      <?php else: ?>
        <a href="<?php echo url_for($route) ?>"><p><?php echo $page['title'] ?></p></a>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>  <!-- e: wrksto -->
