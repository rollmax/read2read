<?php slot('currentPage', 'profile_p_user_contacts') ?>
<?php slot('title_page', 'Personal room - Личный кабинет') ?>
<?php include_partial('profilep/profMenu') ?>

<table id=conts_data cellpadding="0" cellspacing="0">
    <tr class=w id="last-name">
        <td class=left>
            <p>Фамилия</p>
        </td>
        <td class=center>
            <p><?php echo $user->getLastName(); ?></p>
        </td>
        <td class=right>
            <a onclick="account.getLastName('<?php echo url_for('profile_p_last_name'); ?>')">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
    <tr class=b id="first-name">
        <td class=left>
            <p>Имя</p>
        </td>
        <td class=center>
            <p><?php echo $user->getFirstName(); ?></p>
        </td>
        <td class=right>
            <a onclick="account.getFirstName('<?php echo url_for('profile_p_first_name'); ?>')">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
    <tr class=w id="live-place">
        <td class=left>
            <p>Место проживания</p>
        </td>
        <td class=center>
            <p><?php echo $user->getLivePlace(); ?></p>
        </td>
        <td class=right>
            <a onclick="account.getLivePlace('<?php echo url_for('profile_p_live_place'); ?>')">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
    <tr class=b id="contactemail">
        <td class=left>
            <p>e-mail</p>
        </td>
        <td class=center>
            <p><?php echo $user->getContactEmail(); ?></p>
        </td>
        <td class=right>
            <a onclick="account.changeContactEmail('<?php echo url_for('profile_p_contact_email'); ?>')">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
    <tr class=w id="phone">
        <td class=left>
            <p>тел.</p>
        </td>
        <td class=center>
            <p><?php echo $user->getPhone(); ?></p>
        </td>
        <td class=right>
            <a onclick="account.getPhone('<?php echo url_for('profile_p_phone'); ?>');">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
    <tr class=b id="skype">
        <td class=left>
            <p>Скайп</p>
        </td>
        <td class=center>
            <p><?php echo $user->getSkype(); ?></p>
        </td>
        <td class=right>
            <a onclick="account.getSkype('<?php echo url_for('profile_p_skype'); ?>');">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
    <tr class=w id="site">
        <td class=left>
            <p>Сайт</p>
        </td>
        <td class=center>
            <p><?php echo $user->getSite() ?></p>
        </td>
        <td class=right>
            <a onclick="account.getSite('<?php echo url_for('profile_p_site'); ?>');">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
</table>