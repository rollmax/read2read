<div id=mdl3>
  <form method="post" action="<?php echo url_for('registration_credentials', $user); ?>">
    <?php echo $form->renderHiddenFields(); ?>
    <div id=regh>
      <p>Регистрация&nbsp;<?php echo ($user->getUtype() == 'puser') ? 'переводчика' : 'читателя'; ?></p>
    </div>
    <table id=reg cellpadding="0" cellspacing="1">
      <tr>
        <td class=end>
          <p>&nbsp;Для получения пароля введите логин и нажмите &quot;Ok&quot;</p>
          <?php echo $form['login_check']->render(); ?>
        </td>
      </tr>
    </table>
    <div id=regb>
      <input type=submit value="Ok">
    </div>
  </form>
</div>