<tr id="paragraph-<?php echo $form->getObject()->getId(); ?>" class="paragraphRow">
  <td colspan="3">
    <form id="<?php echo $form->getObject()->getId(); ?>" action="<?php echo url_for('paragraph_update', $form->getObject()); ?>" method="post" >
      <?php echo $form->renderHiddenFields(); ?>
      <table>
        <tr>
          <td class="left" style="padding-top:30px;">
            <?php echo $form['paragraph_en']->renderError(); ?>
            <?php echo $form['paragraph_en']->render(); ?>
          </td>
          <td class="center">
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
              <a class="save" onclick="article.saveParagraph(<?php echo $form->getObject()->getId(); ?>, '<?php echo url_for('paragraph_update', $form->getObject()); ?>');">Coхранить</a>
              <a class="del" onclick="article.deleteParagraph('paragraph-<?php echo $form->getObject()->getId(); ?>', '<?php echo url_for('paragraph_delete', $form->getObject()); ?>')">Удалить</a>
              <?php echo $form['paragraph_ru']->renderError(); ?>
              <?php echo $form['paragraph_ru']->render(); ?>
            </td>
        </tr>

      </table>


    </form>
  </td>
</tr>
