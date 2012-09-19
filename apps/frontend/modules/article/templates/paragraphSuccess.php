<tr id="paragraph-<?php echo $form->getObject()->getId(); ?>" class="paragraphRow work_area">
    <td colspan="3">
        <form id="<?php echo $form->getObject()->getId(); ?>" action="<?php echo url_for('paragraph_update', $form->getObject()); ?>" method="post" >
            <?php echo $form->renderHiddenFields(); ?>
            <table>
                <tr class=work_area>
                    <td colspan=3>
                        <p class=text_style>Стиль текста</p>
                        <p class=text_option><?php echo $form['pad_left']->renderLabel() ?></p><?php echo $form['pad_left']->render() ?>
                        <p class=text_option><?php echo $form['is_bold']->renderLabel() ?></p><?php echo $form['is_bold']->render() ?>
                        <p class=text_option><?php echo $form['is_italic']->renderLabel() ?></p><?php echo $form['is_italic']->render() ?>
                        <p class=text_option><?php echo $form['h_style']->renderLabel() ?></p><?php echo $form['h_style']->render() ?>
                    </td>
                </tr>
                <tr class="work_area">
                    <td class="left">
                        <a class=chng_text onclick="enableChngBlock(this);">Изменить</a>
                        <div class="chng_block" style="display: none;">
                            <a class=save_text onclick="saveTaField(this)">Сохранить</a>
                            <a class=del_text onclick="clearClosestTa(this);">Очистить</a>
                        </div>
                        <?php echo $form['paragraph_en']->renderError(); ?>
                        <?php echo $form['paragraph_en']->render(); ?>
                    </td>
                    <td class="center">
                        <a class="save" onclick="article.saveParagraph(<?php echo $form->getObject()->getId(); ?>, '<?php echo url_for('paragraph_update', $form->getObject()); ?>');">Coхранить</a>
                        <table>
                            <?php foreach ($form->getObject()->getComment() as $comment): ?>
                            <tr id="comment-<?php echo $comment->getId(); ?>">
                                <td>
                                    <a class=chng onclick="article.editComment('comment-<?php echo $comment->getId(); ?>', '<?php echo url_for('comment_edit', $comment); ?>')">Изменить</a>
                                    <p class="lt"><?php echo $comment->getCommentEn(); ?></p>
                                </td>
                                <td>
                                    <a class=del onclick="article.deleteComment('comment-<?php echo $comment->getId(); ?>', '<?php echo url_for('comment_delete', $comment); ?>')">Удалить</a>
                                    <p class="rt"><?php echo $comment->getCommentRu(); ?></p>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <a class="addCmt" onclick="article.addComment('paragraph-<?php echo $form->getObject()->getId(); ?>', '<?php echo url_for('comment_create', $form->getObject()); ?>');">Добавить примечание</a>
                    </td>
                    <td class="right">
                        <a class=chng_text onclick="enableChngBlock(this);">Изменить</a>
                        <div class="chng_block" style="display: none;">
                            <a class=save_text onclick="saveTaField(this)">Сохранить</a>
                            <a class=del_text onclick="clearClosestTa(this)">Очистить</a>
                        </div>
                        <?php echo $form['paragraph_ru']->renderError(); ?>
                        <?php echo $form['paragraph_ru']->render(); ?>
                    </td>
                </tr>
            </table>
        </form>
    </td>
</tr>