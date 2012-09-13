<?php if ($pager->haveToPaginate()): ?>
<tr>
  <td class="list">
  <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <p class=act><?php echo $page ?></p>
    <?php else: ?>
      <a href="<?php echo $url; ?>?page=<?php echo $page; ?>"><?php echo $page ?></a>
    <?php endif; ?>
  <?php endforeach; ?>
  </td>  
</tr>
<?php endif; ?>
