<?php

class tsUploadSourceValidatedFile extends tsUploadSource  {
  
  
  protected $_validatedFile = null;
  
  
  public function __construct($file) {
    
    $this->setValidatedFile($file);
    
  }

  public function getFilePath(){
    
    return $this->getValidatedFile()->getTempName();
  }
  
  public function getFileName(){
    
    return $this->getValidatedFile()->getOriginalName();
  }
  
  protected function getValidatedFile(){
    
    return $this->_validatedFile;
  }
  
  protected function setValidatedFile(sfValidatedFile $file){
    
    $this->_validatedFile = $file;
  }
}
