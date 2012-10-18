<?php slot('page_keywords') ?>
<?php echo $article->getCategory()->getPageKeywords() ?>
<?php end_slot('page_keywords') ?>

<?php slot('page_description') ?>
<?php echo $article->getCategory()->getPageDescription() ?>
<?php end_slot('page_description') ?>

<?php slot('title_page') ?>
<?php echo $article->getCategory()->getNameEn() . ' - ' . $article->getCategory()->getNameRu() ?>
<?php end_slot('title_page') ?>
<?php if (!$sf_user->isAuthenticated()) : ?>
<?php slot(
        'menu_part_1',
        '<td class="act_noreg"><a href="' . url_for(
            'articles_category',
            $article->getCategory()
        ) . '"><p>Parts - Разделы</p></a></td>'
    ) ?>
<?php endif; ?>

<div id="close">
    <?php if ($back_url != '') : ?>
    <a href="<?php echo $back_url; ?>"><p><img src="/images/close_v.png" alt=""></p></a>
    <?php else : ?>
    <a href="<?php echo url_for('articles_category', $article->getCategory()); ?>"><p><img src="/images/close_v.png"
                                                                                           alt=""></p></a>
    <?php endif; ?>
</div>
<table id=article cellpadding="0" cellspacing="0px">
<tr>
    <td>
        <p class="head <?php echo $article->getTitleStyle(true) ?>"><?php echo $article->getTitleEn(); ?></p>
    </td>
    <td class=blg-print>
        <?php if ($sf_user->isAuthenticated()): ?>
        <?php if ($sf_user->getGuardUser()->isPurchaseArticle($article->getId())): ?>
            <br/>
            <a class=print href="<?php echo url_for('article_print', array('id' => $article->getId())) ?>"
               target="_blank"><p>Версия для печати</p></a>
            <?php endif; ?>
        <?php endif; ?>
    </td>
    <td>
        <p class="head <?php echo $article->getTitleStyle(true) ?>"><?php echo $article->getTitleRu(); ?></p>
    </td>
</tr>
<tr>
    <td>
        <p class=authleft>By <?php echo $article->getAuthorEn(); ?></p>
    </td>
    <td class=trans>
        <a onclick="resume.openResume('<?php echo url_for('user_p_resume_data', $article->getTranslator()); ?>');">
            <p class=lt>Перевод</p>

            <p class=rt><?php echo $article->getTranslator()->getFirstName() . ' ' . $article->getTranslator(
            )->getLastName(); ?> </p>

            <p class=re>r2r - резюме&nbsp;&gt;&gt;</p>
        </a>
    </td>
    <td>
        <p class=authright>Автор: <?php echo $article->getAuthorRu(); ?></p>
    </td>
</tr>
<tr>
    <td>
        <p class="txt"><?php echo $article->getPretextEn(); ?></p>
    </td>
    <td class=center>
        <?php if ($sf_user->isAuthenticated()): ?>
        <?php if ($sf_user->getGuardUser()->isPurchaseArticle($article->getId())): ?>

            <?php if (false === $sf_user->getGuardUser()->hasRateContent(
                $article->getId()
            ) || false === $sf_user->getGuardUser()->hasRateTranslate($article->getId())
            ): ?>
                <p class=lt>Оценить</p>
                <p class=rt>&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <?php else: ?>
                <p class=lt>Рэйтинг</p>
                <p class=rt>&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <?php endif; ?>

            <?php if (false === $sf_user->getGuardUser()->hasRateContent($article->getId())): ?>
                <p class=lt_ev>Статью</p>
                <select name="art_rating" class="rating" id="art_rating">
                    <option value="0">0</option>
                    <option value="1">one | один</option>
                    <option value="2">two | два</option>
                    <option value="3">three | три</option>
                    <option value="4">four | четыре</option>
                    <option value="5">five | пять</option>
                </select>

                <div class="rateit" data-rateit-backingfld="#art_rating" data-rateit-resetable="false"
                     id="art_rating_div_user"></div>
                <?php else: ?>
                <p class=lt_ev>Оценка статьи</p>
                <select name="art_rating" class="rating" id="art_rating_rated">
                    <option value="0">0</option>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <option value="<?php echo $i ?>" <?php echo ($i == floor(
                        $article->getContRate()
                    )) ? 'selected' : '';?>>
                        <?php echo $i ?>
                    </option>
                    <?php endfor;?>
                </select>

                <div class="rateit" data-rateit-backingfld="#art_rating_rated" data-rateit-resetable="false"
                     data-rateit-readonly="true"></div>
                <?php endif; ?>

            <?php if (false === $sf_user->getGuardUser()->hasRateTranslate($article->getId())): ?>
                <p class=lt_ev>Перевод</p>
                <select name="trans_rating" class="rating2" id="trans_rating">
                    <option value="0">0</option>
                    <option value="1">one | один</option>
                    <option value="2">two | два</option>
                    <option value="3">three | три</option>
                    <option value="4">four | четыре</option>
                    <option value="5">five | пять</option>
                </select>

                <div class="rateit" data-rateit-backingfld="#trans_rating" data-rateit-resetable="false"
                     id="trans_rating_div_user"></div>
                <?php else: ?>
                <p class=lt_ev>Оценка перевода</p>
                <select name="trans_rating" class="rating" id="trans_rating_rated">
                    <option value="0">0</option>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <option value="<?php echo $i ?>" <?php echo ($i == floor(
                        $article->getTransRate()
                    )) ? 'selected' : '';?>>
                        <?php echo $i ?>
                    </option>
                    <?php endfor;?>
                </select>

                <div class="rateit" data-rateit-backingfld="#trans_rating_rated" data-rateit-resetable="false"
                     data-rateit-readonly="true"></div>
                <?php endif; ?>

            <?php $sEnvironment = sfConfig::get('sf_environment') != 'prod' ? '/frontend_dev.php' : ''; ?>

            <script type="text/javascript" src="/js/jquery.rateit.js"></script>
            <script type="text/javascript">
                $("#art_rating_div_user").bind('rated', function (event, value) {
                    $.post(
                            '<?php echo $sEnvironment?>/article/rate/<?php echo $article->getId()?>/content/' + value,
                            function (data) {
                                if (data.success == 1) {
                                    $('#art_rating_div_user').attr("data-rateit-readonly", "true");
                                    $('#art_rating_div_user .rateit-range').unbind();
                                    return;
                                }
                                else
                                    return;
                            },
                            "json"
                    )
                });

                $("#trans_rating_div_user").bind('rated', function (event, value) {
                    $.post(
                            '<?php echo $sEnvironment?>/article/rate/<?php echo $article->getId()?>/translate/' + value,
                            function (data) {
                                if (data.success == 1) {
                                    $('#trans_rating_div_user').attr("data-rateit-readonly", "true");
                                    $('#trans_rating_div_user .rateit-range').unbind();
                                    return;
                                }
                                else
                                    return;
                            },
                            "json"
                    )
                });
            </script>

            <?php else: ?>
            <p class=lt>&nbsp;</p>
            <p class=rt>&nbsp;</p>
            <?php endif; ?>
        <?php endif; ?>

        <!-- admin rating   -->
        <?php if ($sf_user->isAuthenticated() && $sf_user->hasPermission('admin')): ?>
        <p class=lt>Read2Read</p>
        <p class=rt>&nbsp;&nbsp;&nbsp;&nbsp;</p>

        <p class=lt_ev>Статья</p>
        <select name="art_rating" class="rating" id="art_rating2">
            <option value="0">0</option>
            <?php for ($i = 1; $i <= 5; $i++): ?>
            <option value="<?php echo $i ?>" <?php echo ($i == floor($article->getR2rContRate())) ? 'selected' : '';?>>
                <?php echo $i ?>
            </option>
            <?php endfor;?>
        </select>

        <div class="rateit" data-rateit-backingfld="#art_rating2" data-rateit-resetable="false"
             id="art_rating_div"></div>

        <p class=lt_ev>Перевод</p>
        <select name="cont_rating" class="rating" id="trans_rating2">
            <option value="0">0</option>
            <?php for ($i = 1; $i <= 5; $i++): ?>
            <option value="<?php echo $i ?>" <?php echo ($i == floor($article->getR2rTransRate())) ? 'selected' : '';?>>
                <?php echo $i ?>
            </option>
            <?php endfor;?>
        </select>

        <div class="rateit" data-rateit-backingfld="#trans_rating2" data-rateit-resetable="false"
             id="trans_rating_div"></div>

        <?php $sEnvironment = sfConfig::get('sf_environment') != 'prod' ? '/frontend_dev.php' : ''; ?>

        <script type="text/javascript" src="/js/jquery.rateit.js"></script>
        <script type="text/javascript">
            $("#art_rating_div").bind('rated', function (event, value) {
                $.post(
                        '<?php echo $sEnvironment?>/article/rate/<?php echo $article->getId()?>/r2rcontent/' + value,
                        function (data) {
                            return;
                        },
                        "json"
                )
            });

            $("#trans_rating_div").bind('rated', function (event, value) {
                $.post(
                        '<?php echo $sEnvironment?>/article/rate/<?php echo $article->getId()?>/r2rtranslate/' + value,
                        function (data) {
                            return;
                        },
                        "json"
                )
            });
        </script>

        <?php else: ?>
        <p class=lt>&nbsp;</p>
        <p class=rt>&nbsp;</p>
        <?php endif;?>
        <!-- end admin rating   -->

    </td>
    <td>
        <p class="txt"><?php echo $article->getPretextRu(); ?></p>
    </td>
</tr>
<tr>
    <td>
        <?php echo ($article->getPathPhotoEn()) ? image_tag($article->getPathPhotoEn()) : ''; ?>
    </td>
    <td class=center>
        <p class=lt>&nbsp;</p>

        <p class=rt>&nbsp;</p>
    </td>
    <td>
        <?php echo ($article->getPathPhotoRu()) ? image_tag($article->getPathPhotoRu()) : ''; ?>
    </td>
</tr>
<?php $paragraph_count = 1; ?>
<?php foreach ($article->getParagraph() as $paragraph): ?>
<tr>
    <td>
        <p class="txt <?php echo $paragraph->getParagraphStyle() ?>"><?php echo $paragraph->getParagraphEn(); ?></p>
    </td>
    <td class=center>
        <?php foreach ($paragraph->getComment() as $comment): ?>
        <p class=lt><?php echo $comment->getCommentEn(); ?></p>
        <p class=rt>- <?php echo $comment->getCommentRu(); ?></p>
        <?php endforeach; ?>
    </td>
    <td>
        <?php if ($article->getIsFree() || $sf_user->hasCredential('admin')) : ?>
            <p class="txt <?php echo $paragraph->getParagraphStyle() ?>"><?php echo $paragraph->getParagraphRu(); ?></p>
        <?php else : ?>

        <?php if (!$sf_user->isAuthenticated() && $paragraph_count == 1) : ?>
            <a href="<?php echo url_for('/page/reader-rules') ?>" title="" class=rul><p>Правила сайта&nbsp;&nbsp;&gt;&gt;</p></a>
        <?php endif; ?>
        <?php if ($sf_user->isAuthenticated()) : ?>
            <?php if ($show_full) : ?>
                <p class="txt <?php echo $paragraph->getParagraphStyle() ?>"><?php echo $paragraph->getParagraphRu(); ?></p>
                <?php else: ?>
                <?php if ($paragraph_count == 1) : ?>
                    <p class="txt <?php echo $paragraph->getParagraphStyle() ?>"><?php echo $paragraph->getParagraphRu(); ?></p>
                <?php endif; ?>
                <?php if ($paragraph_count == 2) : ?>
                    <?php if ($is_u_user) : ?>
                        <?php if (!$account_blocked) : ?>
                            <?php if ($has_money) : ?>
                                <a href="<?php echo url_for('@purchase_article?id=' . $article->getId())?>" title="" class=rul><p>Купить&nbsp;перевод&nbsp;&nbsp;&gt;&gt;</p></a>
                                <?php else: ?>
                                <p class=no_money>На Вашем счету недостаточно средств для приобретения перевода <span>к этой статье</span>
                                </p>
                                <?php endif; ?>
                            <?php else: ?>
                            <p class=no_money>На Вашем счету недостаточно средств для приобретения перевода <span>к этой статье</span>
                            </p>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

        <?php endif; ?>
    </td>
</tr>
    <?php $paragraph_count++ ?>
    <?php endforeach; ?>
</table>