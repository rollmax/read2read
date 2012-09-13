<?php
$pages = array(
  'profile_u_user' => array(
    'title' => 'Аккаунт',
    'submenu' => array()
  ),
  'profile_u_account' => array(
    'title' => 'Счет',
    'submenu' => array()
  ),
  'profile_u_purchase' => array(
    'title' => 'Мои покупки',
    'submenu' => array()
  ),
  'profile_u_upic' => array(
    'title' => 'uPic',
    'submenu' => array()
  )
);
?>
<?php $user = $sf_user->getGuardUser();?>
<div id=mdl3>
  <div id=cabh>
    <p>Состояние аккаунта -
<?php if($user->getIsBlocked()) : ?>
&nbsp;действие остановлено
<?php else: ?>
&nbsp;действует
<?php endif; ?>
    </p>
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
  </div>
