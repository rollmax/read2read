<?php slot('currentPage', 'article') ?>
<?php include_partial('article/headBlock') ?>

<table id=wrks_data cellpadding="0" cellspacing="0">
    <tr class=w>
        <td colspan=5><p class=h>Опубликованные работы</p></td>
    </tr>
    <tr class=y>
        <td><p>Текущий период</p></td>
        <td colspan=4><p><?php echo $period->getMonthString()?></p></td>
    </tr>
    <tr class=b>
        <td><p>Работ</p></td>
        <td><p>k знаков</p></td>
        <td><p>Продажи</p></td>
        <td class=sum_of_sales><p>Сумма по продажам</p></td>
        <td><p>k знаков по продажам</p></td>
    </tr>
    <tr class=w>
        <td><p><?php echo $stats_pub->getContentCount() ?></p></td>
        <td><p><?php echo $stats_pub->getLetterSum() / 1000 ?></p></td>
        <td><p><?php echo $stats_pub->getSellCount() ?></p></td>
        <td class=sum_of_sales><p><?php echo number_format($stats_pub->getSellSum(), 2, '.', '') ?></p></td>
        <td><p><?php echo number_format($stats_pub->getSellSum() / $period->get1k(), 3, '.', '') ?></p></td>
    </tr>
</table>

<table id=wrks_data cellpadding="0" cellspacing="0">
    <tr class=w>
        <td colspan=2><p class=h>Неопубликованные работы</p></td>
    </tr>
    <tr class=b>
        <td><p>Работ</p></td>
        <td><p>k знаков</p></td>
    </tr>
    <tr class=w>
        <td><p><?php echo $stats_nopub['article_count'] ?></p></td>
        <td><p><?php echo $stats_nopub['letters_summ'] / 1000 ?></p></td>
    </tr>
</table>
