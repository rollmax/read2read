<tr id="paragraph-<?php echo $paragraph->getId(); ?>" class="paragraphRow">
  <td class="left">
    <?php if ($paragraph->getIsPhoto()): ?>
      <?php echo image_tag($paragraph->getPathPhotoEn()) ?>
    <?php else: ?>
      <p<?php echo sfOutputEscaper::unescape($paragraph->getParagraphStyle()) ?>><?php echo $paragraph->getParagraphEn(); ?></p>
    <?php endif ?>
  </td>
  <td class="center">
      <a class="chng_paragraph" onclick="article.editParagraph('paragraph-<?php echo $paragraph->getId(); ?>', '<?php
      if ($paragraph->getIsPhoto()) {
          echo url_for('paragraph_pic_edit', $paragraph);
      }else{
          echo url_for('paragraph_edit', $paragraph);
      }
      ?>')">Изменить</a>
      <a class="del_paragraph" onclick="article.deleteParagraph('paragraph-<?php echo $paragraph->getId(); ?>', '<?php echo url_for('paragraph_delete', $paragraph); ?>')">Удалить</a>
      <?php if (!$paragraph->getIsPhoto()): ?>
        <table>
          <?php foreach($form->getObject()->getComment() as $comment): ?>
          <tr id="comment-<?php echo $comment->getId(); ?>">
            <td>
              <p class="lt"><?php echo $comment->getCommentEn(); ?></p>
            </td>
            <td>
              <p class="rt"><?php echo $comment->getCommentRu(); ?></p>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        &nbsp;
      <?php endif ?>
  </td>
  <td class="right">
      <?php if ($paragraph->getIsPhoto()): ?>
          <?php echo image_tag($paragraph->getPathPhotoRu()) ?>
      <?php else: ?>
      <p<?php echo sfOutputEscaper::unescape($paragraph->getParagraphStyle()) ?>><?php echo $paragraph->getParagraphRu(); ?></p>
      <?php endif ?>
  </td>
</tr>