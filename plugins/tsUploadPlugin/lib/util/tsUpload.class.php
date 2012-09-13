<?php

require_once(dirname(__FILE__).'/../vendor/class.upload/class.upload.php');

class tsUpload {
  
  protected $_ruleConfig = array();
  protected $_source = null;
  protected $_file = null;
  
  public function __construct($source, $ruleName = 'default') {
    
    $this->setSource(tsUploadSource::create($source));
    
    $defaultRule = array(
      'params' => array(
        'image_resize' => true
      ),
      'sizes' => array()
    );
    
    $uploadConfig = sfYaml::load(sfConfig::get('sf_app_config_dir').'/upload.yml');
    $config = sfToolkit::arrayDeepMerge($uploadConfig['all'], (array)@$uploadConfig[sfConfig::get('sf_environment')]);

    
    $this->_ruleConfig = sfToolkit::arrayDeepMerge((array)@$config['rules']['default'], $config['rules'][$ruleName]);
    $this->_ruleConfig = sfToolkit::arrayDeepMerge($defaultRule, $this->_ruleConfig);
  }
  
  public static function create($source, $rule = 'default') {
    
    return new tsUpload($source, $rule);
  }
  
  public function process() {
    
      $results = array();
      
      foreach ($this->_ruleConfig['sizes'] as $sizeName => $size) {
        
        if (empty($size)) continue;
        
        $upload = new Upload($this->getSource()->getFilePath(), sfContext::getInstance()->getUser()->getCulture());
        
        if (@$this->_ruleConfig['params']['image_resize']) {
          
          $upload->image_resize = true;
        }
        
        foreach ((array)$size as $option => $value) {
          
          if (property_exists($upload, $option)) {
            
            $upload->$option = $value;
          }
        }
        
        
        if (@$size['file_dst_path_builder']) {
          
          $size['file_dst_path'] = call_user_func_array($size['file_dst_path_builder'], array($upload, $this->getSource()));
        }
        
        if (@$size['file_new_name_body_builder']) {
          
          $upload->file_new_name_body = call_user_func_array($size['file_new_name_body_builder'], array($upload, $this->getSource()));
        }
        
        $upload->Process(@$size['file_dst_path'] ? @$size['file_dst_path'] : sfConfig::get('sf_upload_dir').'/uns/');
        
        if ($upload->error) {
          
          throw new tsUploadException($upload->error);
        }
        
        if (@$size['callback']) {
          
          $results[$sizeName] = call_user_func_array($size['callback'], array($upload, $this->getSource()));
        }
        else {
          
          $results[$sizeName] = $upload;
        }
      }
      
    
    
    if (@$this->_ruleConfig['params']['callback']) {
      
      return call_user_func_array($this->_ruleConfig['params']['callback'], array($upload, $results, $this->getSource()));
    }
    else {
      
      return $results;
    }
    
  }
  
  public function setSource(tsUploadSource $source){
    
    $this->_source = $source;
  }
  
  public function getSource(){
    
    return $this->_source;
  }
}
