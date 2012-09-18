<tr class="work_area" id="author_field">
    <td colspan="3">
        <form id="author_form">
        <?php $form->renderHiddenFields() ?>
        <table>
            <tr class="work_area">
                <td class=left>
                    <p><?php echo $form['author_en']->renderLabel(); ?></p>
                    <p><?php echo $form['author_en']->renderError(); ?></p>
                    <?php echo $form['author_en']->render(); ?>
                </td>
                <td class=center><a class=save_author_name onclick="article.updateAuthor('<?php echo url_for('article_author_update', $form->getObject()) ?>');">Сохранить</a></td>
                <td class=right>
                    <p><?php echo $form['author_ru']->renderLabel(); ?></p>
                    <p><?php echo $form['author_ru']->renderError(); ?></p>
                    <?php echo $form['author_ru']->render(); ?>
                </td>
            </tr>
        </table>
        </form>
    </td>
</tr>