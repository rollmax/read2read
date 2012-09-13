<tr class=w id="changeResume">
  <td class=left>
    <form method="post" action="">
      <?php echo $form->renderHiddenFields(); ?>
      <?php echo $form['resume_text']->renderError(); ?>
      <?php echo $form['resume_text']->render(array('rows'=>'10', 'cols'=>'65')); ?>
    </form>
  </td>
  <td class=right>
    <input type="button" onclick="account.changeResumeText('<?php echo url_for('profile_p_user_cv_resume_update'); ?>')" value="Изменить">
  </td>
</tr>
