<?php use_helper('I18N', 'Date') ?>
<?php include_partial('puser/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Информация о р_пользователе', array(), 'messages') ?></h1>
  <?php include_partial('puser/flashes') ?>
  <div id="sf_admin_content">
    <table cellspacing="0" width="100%">
      <tr>
        <th width="60%" colspan="2"><?php echo $user; ?></th>
        <th width="20%" align="center"><?php echo $user->getTariffString(); ?></th>
        <th width="20%" align="center"><?php echo $user->getCreated(); ?></th>
      </tr>
      <tr class="sf_admin_row odd">
        <td colspan="2">Счет за пользование</td>
        <td align="center" colspan="2"><?php echo $balance->getUsePayment(); ?></td>
      </tr>
      <tr class="sf_admin_row even">
        <td colspan="2">Счет "Итого за текущий период"</td>
        <td align="center" colspan="2"><?php echo 0; ?></td>
      </tr>
      <tr>
        <th width="5%">&nbsp;</th>
        <th >Итого по продажам</th>
        <th align="center"><?php echo $balance->getSellPurchaseCnt(); ?></th>
        <th align="center"><?php echo $balance->getAmount(); ?></th>
      </tr>
      <tr align="center">
        <th>&nbsp;</th>
        <th>Работы</th>
        <th>Количество продаж</th>
        <th>Сумма по продажам</th>
      </tr>
      <?php foreach($user->getContent() as $i => $content): $odd = fmod(++$i, 2) ? 'odd' : 'even'; ?>
      <tr class="sf_admin_row <?php echo $odd ?>">
        <td>&nbsp;</td>
        <td><a href="<?php echo sfProjectConfiguration::getActive()->generateFrontendUrl( 'article_by_categories', array('id'=>$content->getId()) ); ?>"><p style="text-align: left"><?php echo $content->getTitleEn()?></p><p style="text-align:right"><?php echo $content->getTitleRu()?></p></a></td>
        <td>0</td>
        <td>0</td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

</div>
