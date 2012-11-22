<?php get_partial('headerSettings') ?>

<?php slot('title_page', 'Home - Главная') ?>
<?php slot('menu_part_1', '<td class="act"><p class="ok">Правила</p></td>') ?>
<div id=mdl>
  <p class=who><?php echo $page->getParent()->getTitle(); ?></p>
  <div id=left>
    <?php foreach($page->getParent()->getSubPage() as $subPage): ?>
      <?php if($subPage->getId() == $page->getId()): ?>
      <p><?php echo $subPage->getName(); ?></p>
      <?php else: ?>
      <a href="<?php echo url_for('static_page_subpage', $subPage); ?>"><?php echo $subPage->getName(); ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
    <?php include_partial('toggleLink', array('page'=>$page)); ?>
  </div>
  <div id=center>
    <p><?php echo html_entity_decode($page->getContent()); ?></p>
  </div>
  <?php $registerRoute = ($page->getParent()->getUrl()=='translator-rules') ? 'registration_p' : 'registration_u'; ?>
  <?php include_partial('rightSide', array('registerRoute' => $registerRoute)); ?>
</div>