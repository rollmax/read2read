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
    <form method="post" action="" enctype="multipart/form-data">
        <?php echo $form->renderHiddenFields(); ?>
        <?php if ($sf_user->hasFlash('notice')): ?>
        <div class="flash_notice" style="text-align: center"><?php echo $sf_user->getFlash('notice', ESC_RAW) ?></div>
        <?php endif; ?>
        <table id=reg cellpadding="0" cellspacing="1">
            <tr>
                <td class=end>
                    <p>&nbsp;<?php echo $message; ?></p>
                    <?php echo isset($form['login_check'])?$form['login_check']->render():$form['img_file_name']->render(); ?>
                </td>
            </tr>
        </table>
        <div>
            <input type=submit value="Ok" class="submit">
        </div>
    </form>
</div>