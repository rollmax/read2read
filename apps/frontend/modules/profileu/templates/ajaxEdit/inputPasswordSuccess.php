<td class="left">
  <p>Пароль</p>
</td>
<td class="center">
  <form method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form['password']->renderError(); ?></p>
    <p><?php echo $form['password']->render(); ?></p>
    <p><?php echo $form['password_confirm']->renderError(); ?></p>
    <p><?php echo $form['password_confirm']->render(); ?></p>
  </form>
</td>
<td class="right">
  <input type="button" onclick="account.change('password', '<?php echo url_for('profile_u_ajax_update', array('type'=>'password')); ?>');" value="Изменить">
</td>