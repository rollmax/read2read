<td class=left>
  <p>Место проживания</p>
</td>
<td class=center>
  <form method="post" action="">
    <?php echo $form->renderHiddenFields(); ?>
    <p><?php echo $form['live_place']->renderError(); ?></p>
    <p><?php echo $form['live_place']->render(); ?></p>
  </form>
</td>
<td class=right>
  <input type="button" onclick="account.changeLivePlace('<?php echo url_for('profile_p_live_place_update'); ?>')" value="Изменить" />
</td>