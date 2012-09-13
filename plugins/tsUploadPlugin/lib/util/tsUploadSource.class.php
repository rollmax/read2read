<?php

abstract class tsUploadSource {
  
  abstract function getFilePath();
  abstract function getFileName();
  
  public static function create($rawSource){

    $source = null;
    if ($rawSource instanceOf sfValidatedFile) {
      
      $source = new tsUploadSourceValidatedFile($rawSource);
    } else {
      
      $source = new tsUploadSourceFilename(strval($rawSource));
    }
    
    return $source;
  }
}
