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
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="3" style="padding: 0;">
            <?php include_partial('titleEdit', array('form' => $form)) ?>
        </td>
    </tr>
    <tr class=b>
        <td colspan=3>
            <input type="submit" class="submit" value="Продолжить"><br>
        </td>
    </tr>
    </form>
    </tbody>
</table>