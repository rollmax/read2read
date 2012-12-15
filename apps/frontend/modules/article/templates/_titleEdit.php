<?php if(isset($is_ajax) && $is_ajax): ?>
        <form id="title_group" action="">
        <?php echo $form->renderHiddenFields() ?>
    <?php endif ?>
    <table id="title_table">
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
            <td class=center>
                <?php if (isset($is_ajax) && $is_ajax): ?>
                <a class="save_zone" href="#" onclick="article.updateTitle('<?php echo url_for('article_title_update', $form->getObject()) ?>');">Сохранить</a>
                <?php endif ?>
            </td>
            <td class=right>
                <p><?php echo $form['title_ru']->renderLabel(); ?></p>
                <p><?php echo $form['title_ru']->renderError(); ?></p>
                <?php echo $form['title_ru']->render(); ?>
            </td>
        </tr>
    </table>
<?php if(isset($is_ajax) && $is_ajax): ?>
        </form>
<?php endif ?>
