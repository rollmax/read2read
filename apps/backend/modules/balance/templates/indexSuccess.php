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
                <td><?php echo number_format((method_exists($sysBalance, 'getDepositPUsers') ? $sysBalance->getDepositPUsers() : 0) + $sysBalance->getDepositUser(), 2) ?></td>
                <td><?php echo number_format($sysBalance->getChargesPUsers() + $sysBalance->getChargesUser(), 2) ?></td>
                <td><?php echo number_format($sysBalance->getInBalancePUsers() + $sysBalance->getInBalanceUser(), 2) ?></td>
                <td><?php echo number_format($sysBalance->getInBalancePUsers() + $sysBalance->getDepositPUsers() + $sysBalance->getInBalanceUser() + $sysBalance->getDepositUser(), 2) ?></td>
                <td><?php echo $sysBalance->getSalesPUsers(); ?></td>
                <td><?php echo number_format($sysBalance->getToPayPUsers() + $sysBalance->getR2rPUsers(), 2) ?></td>
                <td><?php echo number_format($sysBalance->getToPayPUsers(), 2) ?></td>
                <td><?php echo number_format($sysBalance->getR2rPUsers(), 2) ?></td>
            </tr>
            <tr align="center">
                <th>p_пользователи</th>
                <th colspan="8">&nbsp;</th>
            </tr>
            <tr class="sf_admin_row even" align="center">
                <td align="left">Всего</td>
                <td><?php echo number_format($sysBalance->getDepositPUsers(), 2) ?></td>
                <td><?php echo number_format($sysBalance->getChargesPUsers(), 2) ?></td>
                <td><?php echo number_format($sysBalance->getInBalancePUsers(), 2) ?></td>
                <td><?php echo number_format($sysBalance->getInBalancePUsers() + $sysBalance->getDepositPUsers(), 2) ?></td>
                <td><?php echo $sysBalance->getSalesPUsers(); ?></td>
                <td><?php echo number_format($sysBalance->getToPayPUsers() + $sysBalance->getR2rPUsers(), 2) ?></td>
                <td><?php echo number_format($sysBalance->getToPayPUsers(), 2) ?></td>
                <td><?php echo number_format($sysBalance->getR2rPUsers(), 2) ?></td>
            </tr>
            <tr class="sf_admin_row odd" align="center">
                <td align="left">Стандарт</td>
                <td><?php echo $sysBalance->getDepositStandart(); ?></td>
                <td><?php echo $sysBalance->getChargesStandart(); ?></td>
                <td><?php echo $sysBalance->getInBalanceStandart(); ?></td>
                <td><?php echo number_format($sysBalance->getDepositStandart() + $sysBalance->getInBalanceStandart(), 2) ?></td>
                <td><?php echo $sysBalance->getSalesStandart(); ?></td>
                <td><?php echo number_format($sysBalance->getToPayStandart() + $sysBalance->getR2rStandart(), 2) ?></td>
                <td><?php echo $sysBalance->getToPayStandart(); ?></td>
                <td><?php echo $sysBalance->getR2rStandart(); ?></td>
            </tr>
            <tr class="sf_admin_row odd" align="center">
                <td align="left">Эксперт</td>
                <td><?php echo $sysBalance->getDepositExpert(); ?></td>
                <td><?php echo $sysBalance->getChargesExpert(); ?></td>
                <td><?php echo $sysBalance->getInBalanceExpert(); ?></td>
                <td><?php echo number_format($sysBalance->getDepositExpert() + $sysBalance->getInBalanceExpert(), 2) ?></td>
                <td><?php echo $sysBalance->getSalesExpert(); ?></td>
                <td><?php echo number_format($sysBalance->getToPayExpert() + $sysBalance->getR2rExpert(), 2) ?></td>
                <td><?php echo $sysBalance->getToPayExpert(); ?></td>
                <td><?php echo $sysBalance->getR2rExpert(); ?></td>
            </tr>
            <tr class="sf_admin_row odd" align="center">
                <td align="left">Супер</td>
                <td><?php echo $sysBalance->getDepositSuper(); ?></td>
                <td><?php echo $sysBalance->getChargesSuper(); ?></td>
                <td><?php echo $sysBalance->getInBalanceSuper(); ?></td>
                <td><?php echo number_format($sysBalance->getDepositSuper() + $sysBalance->getInBalanceSuper(),2) ?></td>
                <td><?php echo $sysBalance->getSalesSuper(); ?></td>
                <td><?php echo number_format($sysBalance->getToPaySuper() + $sysBalance->getR2rSuper(),2) ?></td>
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
                <td><?php echo number_format($sysBalance->getInBalanceUser() + $sysBalance->getDepositUser(), 2) ?></td>
                <td colspan="4">&nbsp;</td>
            </tr>
        </table>
    </div>

    <div id="sf_admin_footer">
        <?php include_partial('balance/list_footer', array('pager' => $pager)) ?>
    </div>
</div>
