<?php if ($pager->haveToPaginate()): ?>
  <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <p class=act><?php echo $page ?></p>
    <?php else: ?>
      <a href="<?php echo $url; ?>?rpage=<?php echo $page; ?>"><?php echo $page ?></a>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>