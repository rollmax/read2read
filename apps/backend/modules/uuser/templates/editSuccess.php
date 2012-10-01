<?php use_helper('I18N', 'Date') ?>
<?php include_partial('uuser/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Информация о  u_пользователе', array(), 'messages') ?></h1>

  <?php include_partial('uuser/flashes') ?>

  <div id="sf_admin_content">
    <table cellspacing="0" width="100%">
      <tr>
        <th><?php echo $user; ?></th>
        <th colspan="2" align="center"><?php echo $user->getCreated(); ?></th>
      </tr>
      <tr class="sf_admin_row odd">
        <td>Счет за пользование</td>
        <td colspan="2" align="center"><?php echo 0; ?></td>
      </tr>
      <tr>
        <th width="60%">Итого по покупкам</th>
        <th width="20%" align="center"><?php echo $user->getSellPurchaseCnt(); ?></th>
        <th width="20%" align="center"><?php echo $user->getAmount(); ?></th>
      </tr>
      <tr class="sf_admin_row even" align="center">
        <td align="left"><b>Работы</b></td>
        <td>Количество покупок</td>
        <td>Сумма по покупкам</td>
      </tr>
      <?php foreach($user->getContentPurchase() as $i => $content_purchase): $odd = fmod(++$i, 2) ? 'odd' : 'even'; ?>
        <?php $content = $content_purchase->getContent(); ?>
      <tr class="sf_admin_row <?php echo $odd ?>">
        <td><a href="<?php echo sfProjectConfiguration::getActive()->generateFrontendUrl( 'article_by_categories', array('id'=>$content->getId()) ); ?>"><p style="text-align: left"><?php echo $content->getTitleEn()?></p><p style="text-align:right"><?php echo $content->getTitleRu()?></p></a></td>
        <td>1</td>
        <td>0</td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

</div>
