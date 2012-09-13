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