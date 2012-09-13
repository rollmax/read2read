<?php

class tsWidgetFormUploadImageMany extends sfWidgetForm {
  
  public function configure($options = array(), $attributes = array()){
    
    $this->addOption('template', '%thumbnails%');
    $this->setOption('needs_multipart', true);     
    
    $this->addOption('max_count', null);
  }
  
  public function render($name, $value = array(), $attributes = array(), $errors = array()) {

    $widget = array();
    
    use_javascript('jquery.tooltip/jquery.tooltip.js');
    use_stylesheet('../js/jquery.tooltip/jquery.tooltip.css');
    
    
    
    $widget['%thumbnails%'] = '';
    $widget['%thumbnails%'] .= '';
    
    
    $j = 0;
    
    foreach ($value as $j => $image) {
      
      if (!isset($image['id'])) continue;
      
      $fileIdInput = new sfWidgetFormInputHidden();
      $fileNameInput = new sfWidgetFormInputHidden();
      $commentInput = new sfWidgetFormInput(array(), array(
        'maxlength' => 255
      ));
      $largeInput = new sfWidgetFormInputHidden();
      $thumbnailInput = new sfWidgetFormInputHidden();
      
      $widget['%thumbnails%'] .= 
      '<div class="upload_item" style="margin-bottom: 10px;" >'.
        '<span style="display: inline; width: 260px; float: left; text-align: center; padding-top: 10px;">'.link_to($image['name'], strval($image['Large']), array(
        'class' => 'preview',
        'rel' => strval($image['Thumbnail'])
        )).'</span>'.
        '&nbsp;'.
        $thumbnailInput->render($name."[".$j."][Thumbnail]", strval($image['Thumbnail']), array()).
        $largeInput->render($name."[".$j."][Large]", strval($image['Large']), array()).
        $fileNameInput->render($name."[".$j."][name]", $image['name'], array()).
        $fileIdInput->render($name."[".$j."][id]", $image['id'], array()).
        '<span>Title:</span>'.
        $commentInput->render($name."[".$j."][description]", $image['description'], array(
          'class' => 'text  input-mercha-account'
        ))
        .'&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="del-photo"><img src="/images/cross.gif"  style="vertical-align:middle;" /></a>'
      .'</div>'
       ;
      
      
      
        
    }
    
    $i = $j+1;
    
    {
      
      $fileInput = new sfWidgetFormInputFile();
      $commentInput = new sfWidgetFormInput();
      
      $widget['%thumbnails%'] .= 
      '<div class="upload_item" style="margin-bottom: 10px;" >'.
        $fileInput->render($name."[".$i."][file]", null, array('class' => '', 'style' => "padding-left:0px;  width: 260px;  padding:0px; " )).
        '&nbsp;'.
        '<span>Title:</span>'.
        $commentInput->render($name."[".$i."][description]", null, array(
          'class' => 'text  input-mercha-account'
        ))
        .'&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="del-photo" style="vertical-align:middle;"><img src="/images/cross.gif" /></a>'
      .'</div>'
           
      .'<div class=" add-another-location bottom_add_new_category_link" style="padding-top: 0px; padding-bottom: 15px;">'
        .'<div class="plus_category">'
          .'<div class="left margin1"><img src="/images/plus.gif" /></div>'
          .'<div class="left margin_top3"><a href="#" class="add-photo">Add Another Photo</a></div>'
        .'</div>'
      .'</div>'
      ;  
        
    }
    
    $js = jq_javascript_tag("
      jQuery(document).ready(function(){
        i = jQuery('.upload_item').length + 1;
        
        jQuery('a.del-photo').live('click', function(e){
          e.preventDefault();
          jQuery(this).parents('.upload_item').remove();
        });
        
        jQuery('.preview').tooltip({ 
            delay: 0, 
            showURL: false, 
            bodyHandler: function() { 
                return jQuery('<img/>').attr('src', jQuery(this).attr('rel')); 
            } 
        });
        
        jQuery('a.add-photo').live('click', function(e){
          
          e.preventDefault();
          
          var already = jQuery('.upload_item');
          
          var newUpload = '';
          
          var maxCount = ".intval($this->getOption('max_count')).";
          
          if ((maxCount > 0 && already.length < maxCount) || maxCount == 0) {
          
            newUpload = 
              '<div class=\'upload_item\' style=\'margin-bottom: 10px;\'><input type=\'file\' name=\'".$name."[' + i + '][file]"."\' class=\"\" style=\"padding-left:0px;  width: 260px; padding:0px; \" />' +
              '&nbsp;<span>Title:</span>' +
              '<input type=\'text\' name=\'".$name."[' + i + '][description]"."\' class=\'text input-mercha-account\' >';
          
            newUpload += 
              '&nbsp;&nbsp;&nbsp;&nbsp;<a href=\'#\' class=\'del-photo\'><img src=\'/images/cross.gif\'  style=\'vertical-align:middle;\' /></a>';
          
            
            
            newUpload += '</div>';
            
            jQuery(newUpload).insertBefore(jQuery(this).parents('div.add-another-location'));
            i++;
          }
        })
      
      });
    ");
    
    
    return $js.'<div id="uploader" style="width: 590px;">'.strtr($this->getOption('template'), $widget).'</div>';
    
    
  }
  
  
   
}
