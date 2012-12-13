<table id=hat cellpadding="0" cellspacing="1px">
    <tr>
        <td class=logo><a href="<?php echo url_for('homepage')?>"><img src="/images/read2read-print.png" border="0"></a></td>
        <td class=ban></td>
        <td class=date>
        </td>		
	</tr>
</table>

<table id=article cellpadding="0" cellspacing="0px">
    <tr>
        <td>
            <p class=head><?php echo $article->getTitleEn(); ?></p>
        </td>        
        <td class=center></td>
        <td><p class=head><?php echo $article->getTitleRu(); ?></p></td>
    </tr>
    <tr>
        <td>
            <p class=authleft>By <?php echo $article->getAuthorEn(); ?></p>
        </td>
        <td class=trans>
		<a href="">
			<p class=lt>Перевод</p>
			<p class=rt><?php echo $article->getTranslator()->getFirstName() . ' '. $article->getTranslator()->getLastName() ; ?></p>
			</a>			
        </td>       
        <td>
            <p class=authright>Автор: <?php echo $article->getAuthorRu(); ?></p>
        </td>
    </tr>
    <tr>
        <td>
            <p>&nbsp;</p>
        </td>
        <td class=center></td>
        <td>
            <p>&nbsp;</p>
        </td>
    </tr>

  <?php foreach($article->getParagraph() as $paragraph): ?>
  <tr>
    <td>
      <p class=txt><?php echo $paragraph->getRawValue()->getParagraphEnBr(); ?></p>
    </td>
    <td class=center>
      <?php foreach($paragraph->getComment() as $comment): ?>
      <p class=lt><?php echo $comment->getCommentEn(); ?></p>
      <p class=rt>- <?php echo $comment->getCommentRu(); ?></p>
      <?php endforeach; ?>
    </td>
    <td>
        <p class=txt><?php echo $paragraph->getRawValue()->getParagraphRuBr(); ?></p>
    </td>
  </tr>
  <?php endforeach; ?>

</table>
