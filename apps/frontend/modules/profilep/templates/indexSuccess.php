<?php slot('currentPage', 'profile_p_user') ?>
<?php slot('title_page', 'Personal room - Личный кабинет') ?>

<?php include_partial('profilep/profMenu') ?>

<table id=account_data cellpadding="0" cellspacing="0">
    <tr id="tariff" class="w">
        <td class=left>
            <p>Тарифный план</p>
        </td>
        <td class=center>
            <p><?php echo $user->getTariffString() ?></p>
            <?php if ($user->getTariffChange() != 'none'): ?>
            <p>(Будет изменен на "<?php echo $user->getTariffChangeString(); ?>")</p>
            <?php endif; ?>
        </td>
        <td class=right>
            <a onclick="account.getTariff('<?php echo url_for('profile_p_tarif'); ?>');">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
    <tr class=b>
        <td class=left>
            <p>Стоимость в день</p>
        </td>
        <td class=center>
            <p><?php echo $settings->getPriceByTariff($user->getTariff()) ?></p>
        </td>
        <td class=right>
            <p>&nbsp;</p>
        </td>
    </tr>
    <tr class=g id="balance">
        <td class=left>
            <p>Сумма на счету пользования</p>
        </td>
        <td class=center>
            <p><?php echo $user->getBalans(); ?></p>

        </td>
        <td class=right>
            <a onclick="account.get('balance', '<?php echo url_for('profile_p_balance'); ?>')">
                <p>Пополнить счет</p>
            </a>
        </td>
    </tr>
    <tr id="email" class=b>
        <td class=left>
            <p>e-mail</p>
        </td>
        <td class=center>
            <p><?php echo $user->getEmail() ?></p>
        </td>
        <td class=right>
            <a onclick="account.getEmail('<?php echo url_for('profile_p_email'); ?>');">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
    <tr id="password" class=w>
        <td class=left>
            <p>Пароль</p>
        </td>
        <td class=center>
            <p>***********</p>
        </td>
        <td class=right>
            <a onclick="account.getPassword('<?php echo url_for('profile_p_password'); ?>')">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
    <tr class=b id="userpic">
        <td class=left>
            <p>Юзерпик</p>
        </td>
        <td class=center>
            <?php echo ($user->getUserpicFullPath()) ? '<img src="' . $user->getUserpicFullPath() . '" border="0" alt="">' : ''; ?>
        </td>
        <td class=right>
            <a onclick="account.get('userpic','<?php echo url_for('profile_p_userpic'); ?>')"><p>Изменить</p></a>
        </td>
    </tr>
    <tr class=w id="const-msg">
        <td class=left>
            <p>Постоянное сообщение пользователя</p>
        </td>
        <td class=center>
            <p><?php echo $user->getConstMsgUserPanel(); ?></p>
        </td>
        <td class=right>
            <a onclick="account.get('const-msg', '<?php echo url_for('profile_p_const_msg'); ?>');">
                <p>Изменить</p>
            </a>
        </td>
    </tr>
</table>
