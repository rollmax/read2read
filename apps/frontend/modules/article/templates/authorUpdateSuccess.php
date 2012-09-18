<tr class="b" id="author_field">
    <td class=left>
        <p><?php echo $form->getObject()->getAuthorEn() ?></p>
    </td>
    <td class=center><a class=chng_author_name onclick="article.editAuthor('<?php echo url_for('article_author_edit', $form->getObject()) ?>');">Изменить</a></td>
    <td class=right>
        <p><?php echo $form->getObject()->getAuthorRu() ?></p>
    </td>
</tr>
