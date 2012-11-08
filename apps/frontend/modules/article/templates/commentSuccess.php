<tr id="comment-<?php echo $form->getObject()->getId(); ?>">
    <?php echo $form->renderHiddenFields(); ?>
    <td colspan="2">
      <form id="commentForm-<?php echo $form->getObject()->getId(); ?>" method="post" action="">
        <table>
          <tr>
            <td class="comment">
              <?php echo $form->renderHiddenFields(); ?>
              <a class="save_comment" onclick="article.saveComment('commentForm-<?php echo $form->getObject()->getId(); ?>', '<?php echo url_for('comment_update', $form->getObject()); ?>')">Сохранить</a>
              <p><?php echo $form['comment_en']->renderError(); ?></p>
              <?php echo $form['comment_en']->render(); ?>
            </td>
            <td class="comment">
              <a class="del_comment" onclick="article.deleteComment('comment-<?php echo $form->getObject()->getId(); ?>', '<?php echo url_for('comment_delete', $form->getObject()); ?>')">Удалить</a>
              <p><?php echo $form['comment_ru']->renderError(); ?></p>
              <?php echo $form['comment_ru']->render(); ?>
            </td>
          </tr>
        </table>
      </form>
    </td>
</tr>
