<?php use_helper('I18N'); ?>
<div id=mdl3>
  <div id=regh><p>Регистрация&nbsp;читателя</p></div>
  <form method="post" action="<?php echo url_for('user_create_u'); ?>">
  <?php echo $form->renderHiddenFields(); ?>
  <table id=reg cellpadding="0" cellspacing="1">
    <tr>
      <td colspan="2"><?php echo $form->renderGlobalErrors() ?></td>
    </tr>
    <tr class=w>
      <td class=left>
        <p><?php echo $form['login']->renderLabel() ?></p>
      </td>
      <td class=right>
        <?php echo $form['login']->renderError(); ?>
        <?php echo $form['login']->render(array('class'=>'log')); ?>
      </td>
    </tr>
    <tr class=b>
      <td class=left>
        <p><?php echo $form['email']->renderLabel(); ?></p>
      </td>
      <td class=right>
        <?php echo $form['email']->renderError(); ?>
        <?php echo $form['email']->render(array('class'=>'mail')); ?>
      </td>
    </tr>
  </table>
  <div id=regb>
    <input type=submit value="Далее">
  </div>
</div>
</form>

<!--              mdl3 end       -->