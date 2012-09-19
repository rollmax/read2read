<tr id="paragraph-<?php echo $form->getObject()->getId() ?>" class="paragraphRow work_area">
    <td colspan="3">
    <form id="<?php echo $form->getObject()->getId() ?>" action="<?php echo url_for('paragraph_pic_update', $form->getObject()) ?>">
    <?php echo $form->renderHiddenFields() ?>
        <table>
        <tr class="work_area">
            <td class=left>
                <p><?php echo $form['photo_en']->renderLabel(); ?></p>
                <?php echo ($form->getObject()->getPathPhotoEn()) ? '<p>'.image_tag($form->getObject()->getPathPhotoEn()).'</p>' : '' ; ?>
                <p><?php echo $form['photo_en']->renderError(); ?></p>
                <?php echo $form['photo_en']->render(); ?>
            </td>
            <td class=center>
                <a class=save_author_name onclick="article.savePicParagraph(<?php echo $form->getObject()->getId() ?>, '<?php echo url_for('paragraph_pic_update', $form->getObject()) ?>');">Сохранить</a>
            </td>
            <td class=right>
                <p><?php echo $form['photo_ru']->renderLabel(); ?></p>
                <?php echo ($form->getObject()->getPathPhotoRu()) ? '<p>'.image_tag($form->getObject()->getPathPhotoRu()).'</p>' : '' ; ?>
                <p><?php echo $form['photo_ru']->renderError(); ?></p>
                <?php echo $form['photo_ru']->render(); ?>
        </tr>
        </table>
    </form>
    </td>
</tr>