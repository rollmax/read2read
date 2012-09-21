<?php use_helper('I18N', 'Date') ?>
<?php include_partial('balance/assets') ?>

<div id="sf_admin_container">
    <h1><?php echo __('Опции', array(), 'messages') ?></h1>

    <?php include_partial('balance/flashes') ?>

    <div id="sf_admin_header">
        <?php include_partial('balance/list_header', array('pager' => $pager)) ?>
    </div>

    <div id="sf_admin_content">
        <table cellspacing="0" width="100%">
            <tr align="center">
                <th>&nbsp;</th>
                <th>Поступления денег</th>
                <th>Расходы<br/>пользователей</th>
                <th>Остаток<br/>на начало<br/>периода</th>
                <th>Наличие<br/>(остаток +<br/>поступления)</th>
                <th>Продажи</th>
                <th>Сумма по<br/>продажам</th>
                <th>К выплате</th>
                <th>Доля R2R</th>
            </tr>
            <tr class="sf_admin_row odd" align="center">
                <td align="left">Всего</td>
                <td><?php echo (method_exists($sysBalance, 'getDepositPUsers') ? $sysBalance->getDepositPUsers() : 0) + $sysBalance->getDepositUser(); ?></td>
                <td><?php echo $sysBalance->getChargesPUsers() + $sysBalance->getChargesUser(); ?></td>
                <td><?php echo $sysBalance->getInBalancePUsers() + $sysBalance->getInBalanceUser(); ?></td>
                <td><?php echo $sysBalance->getInBalancePUsers() + $sysBalance->getDepositPUsers() + $sysBalance->getInBalanceUser() + $sysBalance->getDepositUser(); ?></td>
                <td><?php echo $sysBalance->getSalesPUsers(); ?></td>
                <td>0</td>
                <td><?php echo $sysBalance->getToPayPUsers(); ?></td>
                <td><?php echo $sysBalance->getR2rPUsers(); ?></td>
            </tr>
            <tr align="center">
                <th>p_пользователи</th>
                <th colspan="8">&nbsp;</th>
            </tr>
            <tr class="sf_admin_row even" align="center">
                <td align="left">Всего</td>
                <td><?php echo $sysBalance->getDepositPUsers(); ?></td>
                <td><?php echo $sysBalance->getChargesPUsers(); ?></td>
                <td><?php echo $sysBalance->getInBalancePUsers(); ?></td>
                <td><?php echo $sysBalance->getInBalancePUsers() + $sysBalance->getDepositPUsers(); ?></td>
                <td><?php echo $sysBalance->getSalesPUsers(); ?></td>
                <td>0</td>
                <td><?php echo $sysBalance->getToPayPUsers(); ?></td>
                <td><?php echo $sysBalance->getR2rPUsers(); ?></td>
            </tr>
            <tr class="sf_admin_row odd" align="center">
                <td align="left">Стандарт</td>
                <td><?php echo $sysBalance->getDepositStandart(); ?></td>
                <td><?php echo $sysBalance->getChargesStandart(); ?></td>
                <td><?php echo $sysBalance->getInBalanceStandart(); ?></td>
                <td><?php echo $sysBalance->getDepositStandart() + $sysBalance->getInBalanceStandart(); ?></td>
                <td><?php echo $sysBalance->getSalesStandart(); ?></td>
                <td>0</td>
                <td><?php echo $sysBalance->getToPayStandart(); ?></td>
                <td><?php echo $sysBalance->getR2rStandart(); ?></td>
            </tr>
            <tr class="sf_admin_row odd" align="center">
                <td align="left">Эксперт</td>
                <td><?php echo $sysBalance->getDepositExpert(); ?></td>
                <td><?php echo $sysBalance->getChargesExpert(); ?></td>
                <td><?php echo $sysBalance->getInBalanceExpert(); ?></td>
                <td><?php echo $sysBalance->getDepositExpert() + $sysBalance->getInBalanceExpert(); ?></td>
                <td><?php echo $sysBalance->getSalesExpert(); ?></td>
                <td>0</td>
                <td><?php echo $sysBalance->getToPayExpert(); ?></td>
                <td><?php echo $sysBalance->getR2rExpert(); ?></td>
            </tr>
            <tr class="sf_admin_row odd" align="center">
                <td align="left">Супер</td>
                <td><?php echo $sysBalance->getDepositSuper(); ?></td>
                <td><?php echo $sysBalance->getChargesSuper(); ?></td>
                <td><?php echo $sysBalance->getInBalanceSuper(); ?></td>
                <td><?php echo $sysBalance->getDepositSuper() + $sysBalance->getInBalanceSuper(); ?></td>
                <td><?php echo $sysBalance->getSalesSuper(); ?></td>
                <td>0</td>
                <td><?php echo $sysBalance->getToPaySuper(); ?></td>
                <td><?php echo $sysBalance->getR2rSuper(); ?></td>
            </tr>
            <tr align="center">
                <th>u_пользователи</th>
                <th colspan="9">&nbsp;</th>
            </tr>
            <tr class="sf_admin_row even" align="center">
                <td align="left">Всего</td>
                <td><?php echo $sysBalance->getDepositUser(); ?></td>
                <td><?php echo $sysBalance->getChargesUser(); ?></td>
                <td><?php echo $sysBalance->getInBalanceUser(); ?></td>
                <td><?php echo $sysBalance->getInBalanceUser() + $sysBalance->getDepositUser(); ?></td>
                <td colspan="4">&nbsp;</td>
            </tr>
        </table>
    </div>

    <div id="sf_admin_footer">
        <?php include_partial('balance/list_footer', array('pager' => $pager)) ?>
    </div>
</div>
