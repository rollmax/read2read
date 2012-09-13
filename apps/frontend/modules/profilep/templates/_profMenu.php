<?php
$pages = array(
  'profile_p_user' => array(
    'title' => 'Аккаунт',
    'submenu' => array()
  ),
  'profile_p_invoice' => array(
    'title' => 'Счет',
    'submenu' => array()
  ),
  'article' => array(
    'title' => 'Работы',
    'submenu' => array(
        'article_no_published',
        'article_published'
    )
  ),
  'profile_p_user_contacts' => array(
    'title' => 'Контакты',
    'submenu' => array()
  ),
  'profile_p_user_cv' => array(
    'title' => 'Резюме',
    'submenu' => array()
  ),
);
?>
<div id=mdl3>
  <div id=cabh>
    <p><?php echo $sf_user->getGuardUser()->getTariffString() ?></p>
  </div>
  
  <div id="cabto">
    <?php foreach ($pages as $route => $page): ?>
    <div id="to">
      <?php $slot = get_slot('currentPage') ?>
      <?php if($slot === $route || in_array($slot, $page['submenu'])): ?>
        <p class="act"><?php echo $page['title'] ?></p>
      <?php else: ?>
        <a href="<?php echo url_for($route) ?>"><p><?php echo $page['title'] ?></p></a>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
    
    <?php $slot = get_slot('currentPage') ?>
    <?php if($sf_user->getGuardUser()->isEnableStatics()) : $route_stats = 'profile_p_stats'; ?>
      <div id=to>
        <?php $stats_submenu = array('profile_p_stats_size','profile_p_stats_quality','profile_p_stats_visit','profile_p_stats_interpreter'); ?>
        <?php if($slot === $route_stats || in_array($slot, $stats_submenu)): ?>
          <p class="stat_act">Статистика</p>
        <?php else: ?>
          <a href="<?php echo url_for($route_stats) ?>"><p class="stat">Статистика</p></a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    
    <?php if($sf_user->getGuardUser()->isEnableVote1k()) : $route_1k = 'profile_p_vote1k'; ?>
      <div id=to><p>&nbsp;</p></div>
      <div id=to>
        <?php if($slot === $route_1k) : ?>
          <a href="<?php echo url_for($route_1k) ?>"><p class=act>1k знаков</p></a>
        <?php else: ?>
          <a href="<?php echo url_for($route_1k) ?>"><p class="k">1k знаков</p></a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
