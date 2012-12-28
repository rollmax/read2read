<?php slot('currentPage', 'article_published') ?>
<?php include_partial('article/headBlock') ?>

<?php
    function sort_helper($text, $sort, $c_sort)
    {
        if ($c_sort['sortby'] == $sort) {
            $order = ($c_sort['order'] == 'asc') ? 'desc' : 'asc';
            $text .= ($c_sort['order'] == 'desc') ? ' ↓' : ' ↑';
        } else {
            $order = 'desc';
        }
        return link_to(
            '<p>' . $text . '</p>',
            'article_published',
            array('sortby' => $sort, 'order' => $order)
        );
    }
?>


<table id=wrks_data cellpadding="0" cellspacing="0">
    <tr class=w>
        <td colspan=7>
            <p class=h>Опубликованные работы</p>
        </td>
    </tr>
    <tr class=y>
        <td>
            <p>Текущий период</p>
        </td>
        <td colspan=6>
            <p><?php echo $period->getMonthString() ?></p>
        </td>
    </tr>
    <tr class=b>
        <td class=title><p>Работы</p></td>
        <td><?php echo sort_helper('k знаков', 'letters_k', $c_sort) ?></td>
        <td><?php echo sort_helper('Продажи', 'sell_count', $c_sort) ?></td>
        <td class=sum_of_sales><?php echo sort_helper('Сумма по<br> продажам', 'sell_sum', $c_sort) ?></td>
        <td><?php echo sort_helper('Дата <br>публикации', 'pub_date', $c_sort) ?></td>
        <td class=part><?php echo sort_helper('Раздел', 'name_ru', $c_sort) ?></td>
        <td><p>&nbsp;</p></td>
    </tr>

    <?php foreach ($pager->getResults() as $cp) : ?>
    <tr class="w">
        <td class="title">
            <p class="left"><?php echo $cp->getTitleEn() ?></p>

            <p class="right"><?php echo $cp->getTitleRu() ?></p>
        </td>
        <td><p><?php echo $cp->getLettersK() / 1000 ?></p></td>
        <td><p><?php if ($cp->getSellCount() > 0): ?>
                    <?php echo $cp->getSellCount() ?>
                <?php else: ?>
                    0
                <?php endif ?>
        </p></td>
        <td class="sum_of_sales"><p>
            <?php if ($cp->getSellCount() > 0): ?>
                <?php echo number_format($cp->getSellSum(), 2, '.', ' ') ?>
            <?php else: ?>
                0.00
            <?php endif ?>
        </p></td>
        <td><p><?php echo $cp->getPubDate() ?></p></td>
        <td class=part>
            <p><?php echo $cp->getCategory()->getNameEn() ?></p>

            <p><?php echo $cp->getCategory()->getNameRu() ?></p>
        </td>
        <td class=del>
            <?php if ($cp->getToDelete()) : ?>
            <p class=deleted>Удалено</p>
            <?php else: ?>
            <?php
            echo link_to(
                '<p>Удалить</p>',
                'article/delete?id=' . $cp->getId(),
                array('method' => 'delete', 'confirm' => 'Удалить работу?')
            )
            ?>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php include_partial('pager', array('pager' => $pager,
                                        'url' => url_for('article_published',
                                            array('sortby'=>$c_sort['sortby'], 'order'=>$c_sort['order'])))); ?>
</table>