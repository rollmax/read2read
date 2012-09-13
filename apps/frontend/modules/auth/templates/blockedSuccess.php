<?php if($sf_user->isAnonymous()): ?>
<?php slot('currentPage', 'homepage') ?>
<?php use_stylesheet('home.css') ?>
<?php endif; ?>

<?php if($sf_user->isAuthenticated()): ?>
<?php slot('title_page') ?>
Account Status - Состояние аккаунта
<?php end_slot('title_page') ?>
<?php endif; ?>

<table id=parts border="0" cellpadding="0" cellspacing="1">

    <tr>
        <td></td>
    </tr>
    <?php foreach ($categories as $category): ?>
    <tr>
        <td>
            <?php if($category->getNameEn() == "For Fun") : ?>
            <a href="<?php echo url_for('articles_category',$category); ?>">
                <p class="lfree"><?php echo $category->getNameEn(); ?>&nbsp;<span>Free !!!</span></p>
                <p class="rfree"><span>Бесплатно !!!</span><?php echo $category->getNameRu() ?></p>
            </a>
            <?php else : ?>
            <a href="<?php echo url_for('articles_category',$category); ?>">
                <p class="left"><?php echo $category->getNameEn(); ?></p>
                <p class="right"><?php echo $category->getNameRu() ?></p>
            </a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td>
        </td>
    </tr>
</table>


<div id="restore">


    <p>Аккаунт блокирован.</p>
    <p>Для восстановления доступа на сайт пройдите по этой <a href="<?php echo url_for('@recovery_password') ?>">ссылке</a></p>

</div>