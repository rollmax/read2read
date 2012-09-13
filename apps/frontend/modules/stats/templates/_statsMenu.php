<?php
$pages = array(
  'profile_p_stats' => array(
    'title' => 'Продажи'
  ),
  'profile_p_stats_size' => array(
    'title' => 'Размер'
  ),
  'profile_p_stats_quality' => array(
    'title' => 'Качество'
  ),
  'profile_p_stats_visit' => array(
    'title' => 'Посещение'
  )
);
?>
  <div id=statto>
    <?php foreach ($pages as $route => $page): ?>
    <div id="sto">
      <?php if (get_slot('currentPage') === $route): ?>
        <p class="act"><?php echo $page['title'] ?></p>
      <?php else: ?>
        <a href="<?php echo url_for($route) ?>"><p><?php echo $page['title'] ?></p></a>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
    
    <?php if($sf_user->getGuardUser()->getTariff() == 'super'): ?>
    <div id="sto">
      <?php if (get_slot('currentPage') === 'profile_p_stats_interpreter'): ?>
        <p class="act">Переводчики</p>
      <?php else: ?>
        <a href="<?php echo url_for('profile_p_stats_interpreter') ?>"><p>Переводчики</p></a>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    
  </div>  <!-- e: statto -->
