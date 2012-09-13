<div id=mdl3>
  <div id=regh>
    <p>Регистрация&nbsp;<?php echo ($user->getUtype() == 'puser') ? 'переводчика' : 'читателя' ?></p>
  </div>
  <table id=reg cellpadding="0" cellspacing="1">
    <tr>
      <td class=end>
        <p class=wht>Ваш логин</p>
        <p class=log><?php echo $user->getLogin(); ?></p>
        <p class=wht>Ваш пароль</p>
        <p class=pssw><?php echo $password; ?></p>
        <p>Ваше контрольное изображение</p>
        <p><img src="<?php echo $imgUrl; ?>" border="0" width="100" height="100"/></p>
        <p class=comm>Для завершения регистрации сохраните пароль и контрольное изображение и нажмите &quot;Ok&quot;</p>
      </td>
    </tr>
  </table>
  <div id=regb>
    <input type=submit value="Ok" onclick="window.location='<?php echo url_for('registration_credentials_ok', $user); ?>'">
  </div>
</div>