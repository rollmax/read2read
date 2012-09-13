<?php if ($pager->haveToPaginate()): ?>
<tr>
  <td class="list">
  <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
      <p class="act" style="display:inline-block; float: left; margin: 0px 3px; width: auto; padding: 3px 0px;"><?php echo $page ?></p>
    <?php else: ?>
      <a href="<?php echo $url; ?>&page=<?php echo $page; ?>" style="width: auto; margin: 0px 1px; float: left;"><?php echo $page ?></a>
    <?php endif; ?>
  <?php endforeach; ?>
  </td>  
</tr>
<?php endif; ?>