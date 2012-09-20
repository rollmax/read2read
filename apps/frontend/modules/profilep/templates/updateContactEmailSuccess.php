<td class="left">
    <p>e-mail</p>
</td>
<td class="center">
    <p><?php echo $user->getContactEmail() ?></p>
</td>
<td class="right">
    <a onclick="account.changeContactEmail('<?php echo url_for('profile_p_contact_email'); ?>');">
        <p>Изменить</p>
    </a>
</td>