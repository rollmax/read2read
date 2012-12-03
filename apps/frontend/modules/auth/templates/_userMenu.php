
<table id=nav cellpadding="0" cellspacing="2px">
  <tr>
    <td class=po><p>In English</p></td>
<?php if ($sf_user->isAuthenticated()): ?>
  <?php $user = $sf_user->getGuardUser();?>
        <td class=act>
          <?php if($user->getUtype() == 'puser'): ?>
            <?php if( !in_array(get_slot('currentPage'), array('profile_p_user','article','article_no_published','article_published','profile_p_user_contacts','profile_p_user_cv','profile_p_invoice','profile_p_stats','profile_p_stats_size','profile_p_stats_visit','profile_p_stats_quality','profile_p_stats_interpreter','profile_p_vote1k')) ) : ?>
              <?php if($user->getIsBlocked()) : ?>
                <a href="<?php echo url_for('@profile_p_user') ?>"><p class="stop">[ <?php echo $user->getLogin(); ?> ]</p></a>
              <?php else : ?>
                <a href="<?php echo url_for('@profile_p_user') ?>"><p class="ok">[ <?php echo $user->getLogin(); ?> ]</p></a>
              <?php endif; ?>
            <?php else: ?>
              <?php if($user->getIsBlocked()) : ?>
                <a href="<?php echo url_for('@homepage') ?>"><p class="stop"><?php echo $user->getLogin(); ?></p></a>
              <?php else : ?>
                <a href="<?php echo url_for('@homepage') ?>"><p class="ok"><?php echo $user->getLogin(); ?></p></a>
              <?php endif; ?>
            <?php endif; ?>
          <?php else: ?>
            <?php if( !in_array(get_slot('currentPage'), array('profile_u_user','profile_u_account','profile_u_purchase','profile_u_upic')) ) : ?>
              <?php if($user->getIsBlocked()) : ?>
                <a href="<?php echo url_for('@profile_u_user') ?>"><p class="stop">[ <?php echo $user->getLogin(); ?> ]</p></a>
              <?php else : ?>
                <a href="<?php echo url_for('@profile_u_user') ?>"><p class="ok">[ <?php echo $user->getLogin(); ?> ]</p></a>
              <?php endif; ?>
            <?php else: ?>
              <?php if($user->getIsBlocked()) : ?>
                <a href="<?php echo url_for('@homepage') ?>"><p class="stop"><?php echo $user->getLogin(); ?></p></a>
              <?php else : ?>
                <a href="<?php echo url_for('@homepage') ?>"><p class="ok"><?php echo $user->getLogin(); ?></p></a>
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>
        </td>
       <td class="but">
        <?php if($user->getIsBlocked()) : ?>
          <?php if(sfContext::getInstance()->getModuleName()=='page'): ?>
            <a href="<?php echo url_for('@homepage') ?>"><p>О сайте</p></a>
          <?php else: ?>
            <a href="<?php echo url_for('static_page', array('url'=>'reader-rules') ) ?>"><p>Правила</p></a>
          <?php endif; ?>
        <?php else : ?>
          <?php if($user->getUtype() == 'puser'): ?>
            <?php if(sfContext::getInstance()->getModuleName()=='room'): ?>
              <a href="<?php echo url_for('@homepage'); ?>"><p>Exit - Выход</p></a>
            <?php else: ?>
              <?php if($user->getTariff() == 'standart'): ?>
                  <a href="<?php echo url_for('room', array('name'=>'sroom')); ?>"><p>sRoom</p></a>
              <?php endif; ?>
              <?php if($user->getTariff() == 'super') : ?>
                  <a href="<?php echo url_for('room', array('name'=>'suproom')); ?>"><p>supRoom</p></a>
              <?php endif; ?>
              <?php if($user->getTariff() == 'expert') : ?>
                  <a href="<?php echo url_for('room', array('name'=>'exroom')); ?>"><p>exRoom</p></a>
              <?php endif; ?>
            <?php endif; ?>
          <?php else: ?>
            <?php if(sfContext::getInstance()->getModuleName()=='room'): ?>
              <a href="<?php echo url_for('@homepage'); ?>"><p>Exit - Выход</p></a>
            <?php else: ?>
              <a href="<?php echo url_for('room', array('name'=>'uroom')); ?>"><p>uRoom</p></a>
            <?php endif; ?>
          <?php endif; ?>
        <?php endif; ?>
       </td>
<?php else : ?>
       <?php //echo sfContext::getInstance()->getActionName();
      if(in_array(sfContext::getInstance()->getActionName(), array('recoveryPassword', 'recoveryPasswordImg', 'recoveryPasswordImgError'))) include_slot('menu_part_1', '<td class="act"><p class="ok">Восстановление пароля</p></td>');
       elseif(sfContext::getInstance()->getActionName() == 'blocked') include_slot('menu_part_1', '<td class="act"><p class="ok">Авторизация</p></td>');
       elseif(sfContext::getInstance()->getModuleName() == 'registration') include_slot('menu_part_1', '<td class="act"><p class="ok">Регистрация</p></td>');
       elseif(in_array(sfContext::getInstance()->getActionName(), array('activatepsw', 'activatepswok'))) include_slot('menu_part_1', '<td class="act"><p class="ok">Внесение изменений</p></td>');
      elseif(sfContext::getInstance()->getActionName() == 'catalog') { include_slot('menu_part_1', '<td class="act"><p class="ok">Каталог статей</p></td>'); }
       else include_slot('menu_part_1', '<td class="act"><p class="ok">О сайте</p></td>') ?>
       <td class=but>
        <?php if (sfContext::getInstance()->getModuleName()=='page'): ?>
          <a href="<?php echo url_for('@homepage') ?>"><p>О сайте</p></a>
        <?php else: ?>
          <a href="<?php echo url_for('static_page', array('url'=>'reader-rules')) ?>"><p>Правила</p></a>
        <?php endif; ?>
       </td>
<?php endif; ?>
    <td class=po><p>По-русски</p></td>
  </tr>
</table>
