<?php slot('currentPage', 'article_no_published') ?>
<?php include_partial('article/headBlock'); ?>
</div> <!-- e: mdl3 -->

<?php $ll = strlen($form->getObject()->getAuthorEn().$form->getObject()->getAuthorRu()); ?>

<table id=add_article cellpadding="0" cellspacing="0px">
  <thead>
    <tr class=b>
      <td class=h colspan=2>
        <p>Добавление статьи</p>
      </td>
      <td class=h>
        <a class=close href="<?php echo url_for('@article_no_published'); ?>">Закрыть</a>
    </tr>
    <tr <?php if($ll) echo 'class=b' ?>>
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
          <p class="h<?php echo ' ' . $form->getObject()->getTitleStyle() ?>"><?php echo $form->getObject()->getTitleEn() ?></p>
      </td>
      <td class=center></td>
      <td class=right>
          <p class="h<?php echo ' ' . $form->getObject()->getTitleStyle() ?>"><?php echo $form->getObject()->getTitleRu() ?></p>
      </td>
    </tr>
    <?php if ($ll == 0): // author_field ?>
    <tr class="work_area" id="author_field">
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
    <?php else: ?>
    <tr class="b" id="author_field">
        <td class=left>
            <p><?php echo $form->getObject()->getAuthorEn() ?></p>
        </td>
        <td class=center><a class=chng_author_name onclick="article.editAuthor('<?php echo url_for('article_author_edit', $form->getObject()) ?>');">Изменить</a></td>
        <td class=right>
            <p><?php echo $form->getObject()->getAuthorRu() ?></p>
        </td>
    </tr>
    <?php endif // author_field?>
    </form>

    <?php foreach ($form->getObject()->getParagraph() as $paragraph): ?>
          <tr id="paragraph-<?php echo $paragraph->getId(); ?>" class="paragraphRow">
            <td class="left">
                <?php if ($paragraph->getIsPhoto()): ?>
                    <?php echo image_tag($paragraph->getPathPhotoEn()) ?>
                <?php else: ?>
                <p<?php echo sfOutputEscaper::unescape($paragraph->getParagraphStyle()) ?>><?php echo sfOutputEscaper::unescape($paragraph->getParagraphEnBr()); ?></p>
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
                    <?php foreach ($paragraph->getComment() as $comment): ?>
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
            <p<?php echo sfOutputEscaper::unescape($paragraph->getParagraphStyle()) ?>><?php echo sfOutputEscaper::unescape($paragraph->getParagraphRuBr()); ?></p>
            <?php endif ?>
        </td>
      </tr>
    <?php endforeach; // $paragraph ?>

    <tr id="add_paragraph_before" <?php if ($ll == 0) echo 'style="display: none;"' ?>>
      <td colspan=3>
          <p class="add_paragraph">Добавить абзац</p>
          <a class="add_picture" style="display: none;" onclick="article.addParagraph('<?php echo url_for('paragraph_pic_create', $form->getObject()) ?>')">Картинку</a>
          <a class="add_text_1" id="add_text_a" onclick="article.addParagraph('<?php echo url_for('paragraph_create', $form->getObject()); ?>');">Текст</a>
      </td>
    </tr>
    <tr class=b <?php if ($ll != 0) echo 'style="display: none;"' ?>>
        <td colspan="3">
            <input type="button" class="submit" value="Сохранить" onclick="document.articleForm.submit();">
        </td>
    </tr>
  </tbody>

</table>