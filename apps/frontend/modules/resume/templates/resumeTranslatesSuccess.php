<?php
$translateJsonArray = array();
foreach($translates as $content)
{
  $translateJsonArray[] = array(
    'url'       => url_for('user_p_resume_article', $content),
    'titleEn'  => $content->getTitleEn(),
    'titleRu'  => $content->getTitleRu()
  );
}
echo json_encode($translateJsonArray);

?>