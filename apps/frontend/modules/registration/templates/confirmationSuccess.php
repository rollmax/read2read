<div id=mdl3>
  <div id=regh>
    <p>Регистрация&nbsp;<?php echo ($user->getUtype() == 'puser') ? 'переводчика' : 'читателя' ?></p>
  </div>
  <table id=reg cellpadding="0" cellspacing="1">
    <tr class=w>
      <td class=left>
        <p>Логин</p>
      </td>
      <td class=right>
        <p><?php echo $user->getLogin(); ?></p>
      </td>
    </tr>
    <tr class=b>
      <td class=left>
        <p>E-mail</p>
      </td>
      <td class=right>
        <p><?php echo $user->getEmail(); ?></p>
      </td>
    </tr>
    <tr>
      <td class=end colspan=2>
        <p>Ссылка для получения пароля будет выслана на указанный вами адрес электронной почты</p>
        <p>Это может потребовать несколько минут.</p>
        <p class=comm>Для продолжения регистрации нажмите &quot;Ok&quot;</p>
      </td>
    </tr>
  </table>
  <div id=regb>
   <input type=submit value="Ok" onclick="window.location='<?php echo url_for('registration_conf', $user); ?>'">
  </div>
</div>