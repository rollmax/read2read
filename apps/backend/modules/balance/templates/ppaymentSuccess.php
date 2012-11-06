<?php use_helper('I18N', 'Date') ?>
<?php include_partial('balance/assets') ?>

<div id="sf_admin_container">
    <h1><?php echo __('Выплаты р_пользователям', array(), 'messages') ?></h1>
    <?php include_partial('balance/flashes') ?>

    <div id="sf_admin_content">
        <table cellspacing="0" width="100%">
            <tr>
                <th width="20%">Итого к выплате</th>
                <th width="20%">&nbsp;</th>
                <th width="20%"><?php echo number_format(BalanceSystem::genMassPayWM(false), 2, '.', '') ?></th>
                <th width="20%"><input type="button" value="Создать файл для массовых выплат" onclick="location.href='<?php echo url_for('@payment_getmp') ?>'" /></th>
                <th>&nbsp;</th>
            </tr>
            <tr class="sf_admin_row odd">
                <td colspan="3">Итого выплачено</td>
                <td>
                    <form action="<?php echo url_for('@payment_processmp') ?>" method="post" enctype="multipart/form-data">
                        <?php echo $form->renderHiddenFields() ?>
                        <?php echo $form['mpfile']->renderError() ?>
                        <?php echo $form['mpfile']->render() ?>
                        <input type="submit" value="Обработать выписку" />
                    </form>
                </td>
                <td><?php echo $paid ?></td>
            </tr>
            <tr>
                <th>Логин</th>
                <th>№ кошелька</th>
                <th>Сумма к выплате</th>
                <th>Признак выплаты</th>
                <th>Выплачено</th>
            </tr>
            <?php foreach ($p_users as $i => $puser): ?>
                <?php
                $to_pay = $puser->getToPayForPeriod(Period::getCurrentPeriod()->getId());
                if ((int)$to_pay):
                    $odd = fmod(++$i, 2) ? 'odd' : 'even';
                ?>
                    <tr class="sf_admin_row <?php echo $odd ?>">
                        <td><?php echo $puser->getLogin(); ?></td>
                        <td><?php echo $puser->getAccountNumber() ?></td>
                        <td><?php echo $to_pay ?></td>
                        <td><span style="color:#FF0000">Не выплачено</span></td>
                        <td>0</td>
                    </tr>
                <?php endif ?>
            <?php endforeach; ?>
        </table>
    </div>

</div>
