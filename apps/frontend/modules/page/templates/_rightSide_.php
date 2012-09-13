<div id=right>
  <a class=reg href="<?php echo url_for($registerRoute); ?>">Регистрация &gt;&gt;</a>
  <div id="in">
  <?php include_component('auth','loginForm') ?>
  <?php if(get_slot('currentPage') != 'contact'): ?>
    <a href="<?php echo url_for('contact'); ?>" class=contacts>&lt;&lt; Контакты</a>
  <?php endif; ?>
  </div>
</div>