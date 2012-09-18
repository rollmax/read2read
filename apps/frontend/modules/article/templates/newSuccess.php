<?php slot('currentPage', 'article_no_published') ?>
<?php include_partial('article/headBlock'); ?>
</div> <!-- e: mdl3 -->

<table id=add_article cellpadding="0" cellspacing="0px">
    <thead>
    <tr class=b>
        <td class=h colspan=2>
            <p>Добавление статьи</p>
        </td>
        <td class=h>
            <a class=close href="<?php echo url_for('@article_no_published'); ?>">Закрыть</a>
        </td>
    </tr>
    </thead>
    <tbody>
    <?php echo form_tag_for($form, '@article'); ?>
    <?php echo $form->renderHiddenFields(); ?>
    <tr class=work_area>
        <td colspan=3>
            <p class=text_style>Стиль заголовка</p>

            <p class=text_option><?php echo $form['is_bold']->renderLabel() ?></p><?php echo $form['is_bold']->render() ?>
            <p class=text_option><?php echo $form['is_italic']->renderLabel() ?></p><?php echo $form['is_italic']->render() ?>
            <p class=text_option><?php echo $form['h_style']->renderLabel() ?></p><?php echo $form['h_style']->render() ?>

        </td>
    </tr>

    <tr>
        <td colspan=3>
            <p><?php echo $form['id_category']->renderLabel(); ?></p>
            <p><?php echo $form['id_category']->renderError(); ?></p>
            <?php echo $form['id_category']->render(); ?>
        </td>
    </tr>
    <tr>
        <td class=left>
            <p><?php echo $form['title_en']->renderLabel(); ?></p>
            <p><?php echo $form['title_en']->renderError(); ?></p>
            <?php echo $form['title_en']->render(); ?>
        </td>
        <td class=center></td>
        <td class=right>
            <p><?php echo $form['title_ru']->renderLabel(); ?></p>
            <p><?php echo $form['title_ru']->renderError(); ?></p>
            <?php echo $form['title_ru']->render(); ?>
        </td>
    </tr>
    <tr class=b>
        <td class=submit colspan=3>
            <input type="submit" value="Продолжить"><br>
        </td>
    </tr>
    </form>
    </tbody>
</table>