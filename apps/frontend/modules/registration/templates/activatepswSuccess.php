<div id=mdl3>
<form action="<?php echo url_for('user_activate_change_psw_ok') ?>" method="POST"> 
  <div id=cabh>
			<p>Получение нового пароля</p>	
			</div>
<table id=account_data cellpadding="0" cellspacing="1">
  <tr>
    <td class=end>						
                            <p class=wht>Ваш пароль</p>
                            <p class=pssw><?php echo $password; ?></p>
                            <p class=comm>Для завершения изменения&nbsp;сохраните пароль<br> &nbsp;и нажмите &quot;Ok&quot;</p>
    </td>
  </tr>
</table>

  <div id=regb>
    <input type=submit value="Ok">
  </div> 
  </form>
</div><!--                    mdl3 end       -->
