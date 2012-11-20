<?php get_component('page', 'headerSettings'); ?>

<?php slot('title_page') ?>
Catalog - Каталог
<?php end_slot('title_page') ?>

<div id=mdl xmlns="http://www.w3.org/1999/html">
    <p>Сайт <span>read2read.ru</span> продает переводы к английским текстам в целях помощи при изучении английского языка. </p>
    <p>Сайт содержит 23 раздела , каждый из которых посвящен какому-либо виду человеческой деятельности или стороне жизни. <br>
    Кроме переводов, вниманию читателей предлагаются комментарии к отдельным словам, выражениям, сокращениям.</p>
    <p>Цена перевода зависит от его объема, который измеряется в тасячах знаков. Считаются все знаки, кроме пробелов. </p>
    <p> Стоимость <b>1тысячи</b> знаков = <span><?php echo number_format(Period::getCurrentPeriod()->get1k(), 2, '.', '') ?> руб.</span></p>

    <table id=items border="0" cellpadding="0" cellspacing="0">

        <tr class=bl>
            <td>
                <p class=le>Title</p>
                <p class=ri>Название</p>
                <p class=price>Цена</p>
                <p class=kzn>Объем</p>
            </td>
        </tr>

        <?php foreach ($catList as $category): ?>

            <tr>
                <td><p class=part><?php echo $category->getNameLanguages() ?></p></td>
            </tr>

            <?php if (count($aList = $category->getCategoryArticlesList()) == 0): ?>
                <tr class="w">
                    <td>
                        <a href="#">
                            <p class="left">Статей нет</p>
                            <p class="right">No items</p>
                            <p class="price">0.00</p>
                            <p class="kzn">0.000</p>
                        </a>
                    </td>
                </tr>
            <?php else: ?>
                <?php $i = 0 ?>
                <?php foreach ($aList as $article): ?>
                    <?php if ($i % 2 == 0): ?>
                    <tr class=b>
                    <?php else: ?>
                    <tr>
                    <?php endif ?>
                    <?php $i = $i + 1 ?>
                        <td>
                            <a href="<?php echo url_for('article_by_categories', $article) ?>">
                                <p class=left><?php echo $article->getTitleEn() ?></p>
                                <p class=right><?php echo $article->getTitleRu() ?></p>
                                <p class=price><?php echo number_format($article->getPrice(), 2, '.', '') ?></p>
                                <p class=kzn><?php echo number_format($article->getLettersK() / 1000, 3, '.', '') ?></p>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        <?php endforeach ?>
    </table>
</div>