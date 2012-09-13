<tr id="paragraph-<?php echo $paragraph->getId(); ?>" class="paragraphRow">
  <td class="left" style="padding-top:30px;">
    <p class="txt"><?php echo $paragraph->getParagraphEn(); ?></p>
  </td>
  <td class="center">
    <table>
      <?php foreach($form->getObject()->getComment() as $comment): ?>
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
    <a class="addCmt" onclick="article.addComment('paragraph-<?php echo $paragraph->getId(); ?>', '<?php echo url_for('comment_create', $paragraph); ?>');">Добавить примечание</a>
  </td>
  <td class="right">
    <a class="edit" onclick="article.editParagraph('paragraph-<?php echo $paragraph->getId(); ?>', '<?php echo url_for('paragraph_edit', $paragraph); ?>')">Изменить</a>
    <a class="del" onclick="article.deleteParagraph('paragraph-<?php echo $paragraph->getId(); ?>', '<?php echo url_for('paragraph_delete', $paragraph); ?>')">Удалить</a>
    <p class="txt"><?php echo $paragraph->getParagraphRu(); ?></p>
  </td>
</tr>