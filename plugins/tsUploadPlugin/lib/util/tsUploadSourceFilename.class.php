<?php

class tsUploadSourceFilename extends tsUploadSource  {
  
  
  protected $_filename = null;
  
  
  public function __construct($file) {
    
    $this->_filename = strval($file);
    
  }

  public function getFilePath(){
    
    return realpath($this->_filename);
  }
  
  public function getFileName(){
    
    return basename($this->_filename);
  }
  
}
