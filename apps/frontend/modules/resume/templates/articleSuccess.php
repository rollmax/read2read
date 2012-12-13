<table id="article" cellpadding="0" cellspacing="0px" class="ajax-article">
    <tr>
        <td>
            <p class="head <?php echo $article->getTitleStyle(true) ?>"><?php echo $article->getTitleEn(); ?></p>
        </td>
        <td class=blg-print>
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
            <a onclick="resume.closeArticle();">
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
            <p class=txt>&nbsp;</p>
        </td>
        <td class=center>
            <p class=lt>&nbsp;</p>

            <p class=rt>&nbsp;</p>
        </td>
        <td>
            <p class=txt>&nbsp;</p>
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
            <?php if ($paragraph->getIsPhoto()): ?>
            <p><?php echo image_tag($paragraph->getPathPhotoEn()) ?></p>
            <?php else: ?>
            <p<?php echo $paragraph->getRawValue()->getParagraphStyle() ?>><?php echo $paragraph->getRawValue()->getParagraphEnBr(); ?></p>
            <?php endif ?>
        </td>
        <td class=center>
            <?php foreach ($paragraph->getComment() as $comment): ?>
            <p class=lt><?php echo $comment->getCommentEn(); ?></p>
            <p class=rt>- <?php echo $comment->getCommentRu(); ?></p>
            <?php endforeach; ?>
        </td>
        <td>
            <?php if ($article->getCategory()->getIsFree() || $sf_user->hasCredential('admin')) : ?>
                <?php if ($paragraph->getIsPhoto()): ?>
                <p><?php echo image_tag($paragraph->getPathPhotoRu()) ?></p>
                <?php else: ?>
                <p<?php echo $paragraph->getRawValue()->getParagraphStyle() ?>><?php echo $paragraph->getRawValue()->getParagraphRuBr(); ?></p>
                <?php endif ?>
            <?php else : ?>

            <?php if (!$sf_user->isAuthenticated() && $paragraph_count == 1) : ?>
                <a href="<?php echo url_for('/page/reader-rules') ?>" title="" class=rul><p>Правила сайта&nbsp;&nbsp;&gt;&gt;</p>
                </a>
                <?php endif; ?>
            <?php if ($sf_user->isAuthenticated()) : ?>
                <?php if ($show_full) : ?>
                        <?php if ($paragraph->getIsPhoto()): ?>
                        <p><?php echo image_tag($paragraph->getPathPhotoRu()) ?></p>
                        <?php else: ?>
                        <p<?php echo $paragraph->getRawValue()->getParagraphStyle() ?>><?php echo $paragraph->getRawValue()->getParagraphRuBr(); ?></p>
                        <?php endif ?>
                    <?php else: ?>
                    <?php if ($paragraph_count == 1) : ?>
                        <p<?php echo $paragraph->getRawValue()->getParagraphStyle() ?>><?php echo $paragraph->getRawValue()->getParagraphRuBr(); ?></p>
                        <?php endif; ?>
                    <?php if ($paragraph_count == 2) : ?>
                        <?php if ($is_u_user) : ?>
                            <?php if (!$account_blocked) : ?>
                                <?php if ($has_money) : ?>
                                    <a href="<?php echo url_for('@purchase_article?id=' . $article->getId())?>" title=""
                                       class=rul><p>Купить&nbsp;перевод&nbsp;&nbsp;&gt;&gt;</p></a>
                                    <?php else: ?>
                                    <p class=no_money>На Вашем счету недостаточно средств для приобретения перевода
                                        <span>к этой статье</span></p>
                                    <?php endif; ?>
                                <?php else: ?>
                                <a href="<?php echo url_for('/page/reader-rules') ?>" title="" class=rul><p>Правила
                                    сайта&nbsp;&nbsp;&gt;&gt;</p></a>
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