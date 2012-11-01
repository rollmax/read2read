<tr id="comment-<?php echo $form->getObject()->getId(); ?>">
    <?php echo $form->renderHiddenFields(); ?>
    <td colspan="2">
      <form id="commentForm-<?php echo $form->getObject()->getId(); ?>" method="post" action="">
        <table>
          <tr>
            <td class="comment">
              <?php echo $form->renderHiddenFields(); ?>
              <a class="saveCmt" onclick="article.saveComment('commentForm-<?php echo $form->getObject()->getId(); ?>', '<?php echo url_for('comment_update', $form->getObject()); ?>')">Сохранить</a>
              <p><?php echo $form['comment_en']->renderError(); ?></p>
              <p><?php echo $form['comment_en']->render(); ?></p>
            </td>
            <td class="comment">
              <a class=del onclick="article.deleteComment('comment-<?php echo $form->getObject()->getId(); ?>', '<?php echo url_for('comment_delete', $form->getObject()); ?>')">Удалить</a>
              <p><?php echo $form['comment_ru']->renderError(); ?></p>
              <p><?php echo $form['comment_ru']->render(); ?></p>
            </td>
          </tr>
        </table>
      </form>
    </td>
</tr>
