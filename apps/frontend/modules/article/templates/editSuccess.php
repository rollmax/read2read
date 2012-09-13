<?php slot('currentPage', 'article_no_published') ?>
<?php include_partial('article/headBlock'); ?>
</div> <!-- e: mdl3 -->

<table id=add_article cellpadding="0" cellspacing="0px">
  <thead>
    <tr class=b>
      <td class=h colspan=2>
        <p>Добавление статьи</p>
      </td>
      <td class=h>
        <a class=close href="<?php echo url_for('@article_no_published'); ?>">Закрыть</a>
    </tr>
    <tr>
      <td colspan=3>
        <p><?php echo $form->getObject()->getCategory()->getNameLanguages(); ?></p>
      </td>
    </tr>
  </thead>
  <tbody>
    <?php echo form_tag_for($form, '@article', array('name'=>'articleForm')); ?>
    <?php echo $form->renderHiddenFields(); ?>
    <tr>
      <td class=left>
        <p><?php echo $form['title_en']->renderLabel(); ?></p>
        <p><?php echo $form['title_en']->renderError(); ?></p>
        <p><?php echo $form['title_en']->render(); ?></p>
      </td>
      <td class=center></td>
      <td class=right>
        <p><?php echo $form['title_ru']->renderLabel(); ?></p>
        <p><?php echo $form['title_ru']->renderError(); ?></p>
        <p><?php echo $form['title_ru']->render(); ?></p>
      </td>
    </tr>
    <tr>
      <td class=left>
        <p><?php echo $form['author_en']->renderLabel(); ?></p>
        <p><?php echo $form['author_en']->renderError(); ?></p>
        <?php echo $form['author_en']->render(); ?>
      </td>
      <td class=center></td>
      <td class=right>
        <p><?php echo $form['author_ru']->renderLabel(); ?></p>
        <p><?php echo $form['author_ru']->renderError(); ?></p>
        <?php echo $form['author_ru']->render(); ?>
      </td>
    </tr>
    <tr>
      <td class=left>
        <p><?php echo $form['pretext_en']->renderLabel(); ?></p>
        <p><?php echo $form['pretext_en']->renderError(); ?></p>
        <?php echo $form['pretext_en']->render(); ?>
      </td>
      <td class=center></td>
      <td class=right>
        <p><?php echo $form['pretext_ru']->renderLabel(); ?></p>
        <p><?php echo $form['pretext_ru']->renderError(); ?></p>
        <?php echo $form['pretext_ru']->render(); ?>
      </td>
    </tr>
    <tr class="article_image">
      <td class=left>
        <p><?php echo $form['photo_en']->renderLabel(); ?></p>
        <?php echo ($form->getObject()->getPathPhotoEn()) ? '<p>'.image_tag($form->getObject()->getPathPhotoEn()).'</p>' : '' ; ?>
        <p><?php echo $form['photo_en']->renderError(); ?></p>
        <?php echo $form['photo_en']->render(); ?>
      </td>
      <td class=center></td>
      <td class=right>
        <p><?php echo $form['photo_ru']->renderLabel(); ?></p>
        <?php echo ($form->getObject()->getPathPhotoRu()) ? '<p>'.image_tag($form->getObject()->getPathPhotoRu()).'</p>' : '' ; ?>
        <p><?php echo $form['photo_ru']->renderError(); ?></p>
        <?php echo $form['photo_ru']->render(); ?>
    </tr>
    </form>
    <?php foreach ($form->getObject()->getParagraph() as $paragraph): ?>
          <tr id="paragraph-<?php echo $paragraph->getId(); ?>" class="paragraphRow">
            <td class="left" style="padding-top:30px;">
              <p class="txt"><?php echo $paragraph->getParagraphEn(); ?></p>
            </td>
            <td class="center">
              <table>
          <?php foreach ($paragraph->getComment() as $comment): ?>
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

    <?php endforeach; ?>
    <tr class=b>
      <td colspan=3 class="add_paragraph">
        <a onclick="article.addParagraph('<?php echo url_for('paragraph_create', $form->getObject()); ?>');">Добавить абзац</a>
      </td>
    </tr>
    <tr class=b>
      <td class="submit" colspan="3">
        <input type="button" value="Сохранить" onclick="document.articleForm.submit();">
      </td>
    </tr>
  </tbody>


</table>