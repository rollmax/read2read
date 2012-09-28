<?php slot('currentPage', 'profile_p_invoice') ?>
<?php slot('title_page', 'Personal room - Личный кабинет') ?>
<?php include_partial('profilep/profMenu') ?>
<table id=count_data cellpadding="0" cellspacing="0">
  <tr class=yg>
    <td class=left>
      <p>Расчетный период</p>
    </td>
    <td class=center>
      <p>Декабрь</p>
    </td>
    <td class=right>
      <a href="#">
        <p>Подробнее</p>
      </a>
    </td>
  </tr>
  <tr class=g>
    <td class=left>
      <p>К выплате</p>
    </td>
    <td class=center>
      <p class=pay_out>0.00</p>
    </td>
    <td class=right>
      <p><span class=paid>Выплачено</span></p>
    </td>
  </tr>
</table>

<table id=count_data cellpadding="0" cellspacing="0">
  <tr class=w>
    <td class=left>
      <p>Текущий период</p>
    </td>
    <td class=center>
      <p><?php echo $period->getMonthString(); ?></p>
    </td>
    <td class=right>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr class=b>
    <td class=left>
      <p class=ok>Всего k знаков</p>
    </td>
    <td class=center>
      <p>0.000</p>
    </td>
    <td class=right>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr class=w>
    <td class=left>
      <p class=ok>Цена за 1k знаков</p>
    </td>
    <td class=center>
      <p><span class=k_zn><?php echo $period->get1k(); ?></span></p>
    </td>
    <td class=right>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr class=b>
    <td class=left>
      <p>В счет r2r</p>
    </td>
    <td  class=center>
      <p><span class=r2r_share><?php echo Setting::getR2RPercent(); ?>%</span></p>
    </td>
    <td class=right>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr class=y>
    <td class=left>
      <p>Итого за текущий период</p>
    </td>
    <td class=center>
      <p>0.00</p>
    </td>
    <td class=right>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr class=w id="account_number">
    <?php if($form == null): ?>
      <td class=left><p>Номер кошелька</p></td>
      <td class=center><p><?php echo $user->getAccountNumber(); ?></p></td>
      <td class=right>
        <a onclick="account.get('account_number', '<?php echo url_for('profile_p_edit', array('fieldname'=>'account_number_img')); ?>');">
          <p>Изменить номер</p>
        </a>
      </td>
    <?php elseif($form_type == 'secure_img'): ?>
      <td class=left><p class=chng_wal><?php echo $titleName; ?></p></td>
      <td class=center>
        <?php if(isset($error_img)): ?>
          <p class="fail">Открытое изображение не верно</p>
        <?php endif; ?>
        <p class=open_check_pic>Откройте контрольное изображение</p>
        <form method="post" action="<?php echo url_for('profile_p_invoice') ?>" enctype="multipart/form-data">
          <?php echo $form->renderHiddenFields(); ?>
          <p><?php echo $form['img_file_name']->render(); ?></p>
          <p><input type="submit" value="Изменить"></p>
        </form>
      </td>
      <td class=right>&nbsp;</td>
    <?php elseif($form_type == 'account_number'): ?>
      <td class=left><p><?php echo $titleName; ?></p></td>
      <td class=center>
        <form method="post" action="">
          <?php echo $form->renderHiddenFields(); ?>
          <p><?php echo $form[$fieldName]->renderError(); ?></p>
          <p><?php echo $form[$fieldName]->render(); ?></p>
        </form>
      </td>
      <td class=right>
        <input type="button" value="Изменить" onclick="account.change('<?php echo $cssId; ?>', '<?php echo url_for('profile_p_update', array('fieldname'=>$fieldName)); ?>');" />
      </td>    
    <?php endif; ?>
  </tr>
</table>