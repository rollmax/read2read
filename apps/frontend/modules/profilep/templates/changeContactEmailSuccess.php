<td class="left">
    <p>e-mail</p>
</td>
<td class="center">
    <form id="<?php echo $form->getObject()->getId(); ?>" method="post" action="">
        <?php echo $form->renderHiddenFields(); ?>
        <p><?php echo $form['contact_email']->renderError(); ?></p>
        <?php echo $form['contact_email']->render(); ?>
    </form>
</td>
<td class="right">
    <input type="button" onclick="account.changeContactEmail('<?php echo url_for('profile_p_update_contact_email'); ?>')" value="Изменить" />
</td>
