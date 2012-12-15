<table id="title_table">
<tr <?php if($ll) echo 'class=b' ?>>
    <td colspan=3>
        <p><?php echo $form->getObject()->getCategory()->getNameLanguages(); ?></p>
    </td>
</tr>
<tr>
    <td class=left>
        <p class="h<?php echo ' ' . $form->getObject()->getTitleStyle() ?>"><?php echo $form->getObject()->getTitleEn() ?></p>
    </td>
    <td class=center><a class="chng_author_name" onclick="article.editTitle('<?php echo url_for('article_title_edit', $form->getObject()) ?>');">Изменить</a></td>
    <td class=right>
        <p class="h<?php echo ' ' . $form->getObject()->getTitleStyle() ?>"><?php echo $form->getObject()->getTitleRu() ?></p>
    </td>
</tr>
</table>