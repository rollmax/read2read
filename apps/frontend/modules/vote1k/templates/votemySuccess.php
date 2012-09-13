<?php slot('currentPage', 'profile_p_vote1k') ?>
<?php include_partial('profilep/profMenu') ?>

<table id=vote_data cellpadding="0" cellspacing="1">
  <tr>
    <td class=h colspan=5><p>Голосование по моему предложению</p></td>
  </tr>
  <tr class=y>
    <td><p>Позиция в списке</p></td>
    <td><p>Предложение</p></td>
    <td><p>Вес голоса</p></td>
    <td><p>Присоединилось</p></td>
    <td><p>Общий вес &quot;ЗА&quot;</p></td>
  </tr>
  <tr class=w>
    <td class="position"><a href="<?php echo url_for('profile_p_vote1k_all'); ?>"><?php echo $vote->getPosition(); ?></a></td>
    <td><p><?php echo $vote->getPrice(); ?></p></td>
    <td><p><?php echo $vote->getUser()->getWeight(); ?>%</p></td>
    <td><p><?php echo $vote->getJoins(); ?></p></td>
    <td><p><?php echo $vote->getWeight(); ?>%</p></td>
  </tr>
  <tr class=db>
    <td  colspan=5>
      <p></p>
    </td>
  </tr>
</table>
