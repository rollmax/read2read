<?php
  $url = ($page->getParent()->getUrl()=='translator-rules') ? 'reader-rules' : 'translator-rules';
  $title = ($page->getParent()->getUrl()=='translator-rules') ? 'Читателям' : 'Переводчикам' ;
?>
<hr>
<a class=trans href="<?php echo url_for('static_page', array('url'=>$url)); ?>"><?php echo $title ?></a>