<?php use_helper('I18N', 'Date') ?>
<?php include_partial('balance/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Выплаты р_пользователям', array(), 'messages') ?></h1>
  <?php include_partial('balance/flashes') ?>

  <div id="sf_admin_content">
    <table cellspacing="0" width="100%">
      <tr>
        <th width="20%">Итого к выплате</th>
        <th width="20%">&nbsp;</th>
        <th width="20%">0<?php // echo $sysBalance->getToPayPUsers(); ?></th>
        <th width="20%"><input type="button" value="Создать файл" /></th>
        <th ><a href="#">Путь к файлу</a></th>
      </tr>
      <tr class="sf_admin_row odd">
        <td colspan="3">Итого выплачено</td>
        <td><input type="button" value="Запросить файл" /></td>
        <td>0</td>
      </tr>
      <tr>
        <th>Логин</th>
        <th>№ кошелька</th>
        <th>Сумма к выплате</th>
        <th>Признак выплаты</th>
        <th>Выплачено</th>
      </tr>
      <?php foreach($p_users as $i => $puser): $odd = fmod(++$i, 2) ? 'odd' : 'even'; ?>
      <tr class="sf_admin_row <?php echo $odd ?>">
        <td><?php echo $puser->getLogin(); ?></td>
        <td>0</td>
        <td>0</td>
        <td><span style="color:#FF0000">Не выплачено</span></td>
        <td>0</td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
  
</div>
