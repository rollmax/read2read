
<form id="login_form" action="<?php //echo url_for('@homepage')
?>" method="post">
  <?php echo $form->renderGlobalErrors() ?>
  <?php echo $form->renderHiddenFields() ?>
  <p>Логин:</p>
  <?php echo $form['login']->renderError() ?>
  <?php echo $form['login']->render() ?>
  <p>Пароль:</p>
  <?php echo $form['password']->renderError() ?>
  <?php echo $form['password']->render() ?><?php if ($sf_user->hasFlash('notice')): ?>
    <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
    <?php endif; ?>
    <?php if ($sf_user->hasFlash('error')): ?>
    <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
    <?php endif; ?>
  <input class=submit type=submit value="Войти">
</form>
<a href="<?php echo url_for('@recovery_password') ?>"><p>Восстановить пароль</p></a>
