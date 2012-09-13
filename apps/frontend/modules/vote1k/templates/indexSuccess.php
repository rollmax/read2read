<?php slot('currentPage', 'profile_p_vote1k') ?>
<?php include_partial('profilep/profMenu') ?>

<table id=vote cellpadding="0" cellspacing="1">
  <tr class=w>
    <td class=left>
      <p>Расчетный период</p>
    </td>
    <td class=center>
      <p><?php echo $period->getMonthString(); ?></p>
    </td>
    <td class=right>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr class=g>
    <td class=left>
      <p class=ok>Текущая стоимость 1k знаков</p>
    </td>
    <td class=center>
      <p class=k><?php echo $period->get1k(); ?></p>
    </td>
    <td class=right>
      <p>&nbsp;</p>
    </td>
  </tr>
  <?php if($user->hasVote()->count() === 0): ?>
  <form method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <tr class=w>
      <td class=left>
        <p class=ok>Я предлагаю</p>
      </td>
      <td class=center>
          <?php echo $form['price']->renderError(); ?>
          <?php echo $form['price']->render(array('maxlength'=>4)); ?>
      </td>
      <td class=right>
        <input type="submit" value="Предложить" name="create-vote">
      </td>
    </tr>
  </form>
  <?php else: ?>
  <tr class=w>
    <td class=left><p class=ok>Я предложил</p></td>
    <td class=center><p class=bid><?php echo $user->hasVote()->getFirst()->getPrice(); ?></p></td>
    <td class=right><a href="<?php echo url_for('profile_p_vote1k_my') ?>"><p>Посмотреть ход&nbsp;голосования</p></a></td>
  </tr>
  <?php endif; ?>
  <tr>
    <td class=left>
      <p class=ok>Вес моего голоса</p>
    </td>
    <td class=center>
      <p class=cent><?php echo $user->getWeight(); ?>%</p>
    </td>
    <td class=right>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr class=b>
    <td class=left>
      <p class=ok>Других предложений</p>
    </td>
    <td class=center>
      <p><?php echo $period->getVote()->count(); ?></p>
    </td>
    <td class=right><a href="<?php echo url_for('profile_p_vote1k_all') ?>"><p>Посмотреть страницу голосований</p></a></td>
  </tr>
  <tr class=b>
    <td  colspan=3>
      <p> </p>
    </td>
  </tr>
</table>
