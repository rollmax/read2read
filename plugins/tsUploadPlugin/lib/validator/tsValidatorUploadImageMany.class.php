<?php
class tsValidatorUploadImageMany extends sfValidatorBase {

  public function configure($options = array(), $attributes = array()) {
    
    $this->addRequiredOption('rule');
    $this->addRequiredOption('model');
    
    $this->addOption('max_count', null);
    $this->addMessage('max_count', 'You can add %max_count% Photos');
    
  }
  
  protected function doClean($value){
    
    set_time_limit(0);
    
    
    $uploads = new Doctrine_Collection($this->getOption('model'));
    
    $fileValidator = new sfValidatorFile(array(
      'mime_types' => 'web_images'
    ));
    
    $descriptionValidator = new sfValidatorString(array(
      'max_length' => 255,
      'required' => false,
      'trim' => true
    ));
    
    
    foreach ($value as $file) {
      
      $validatedDescription = $descriptionValidator->clean($file['description']);
      
      if (isset($file['file']) && is_array($file['file']) && $file['file']['tmp_name']) {
        
        $validatedFile = $fileValidator->clean($file['file']);
        
        
        
        try {
          
          $uploadedFileRecord = tsUpload::create($validatedFile, $this->getOption('rule'))->process();
          
        }catch (tsUploadException $e) {
          
          throw (new sfValidatorError($this, $e->getMessage()));
        }
        
        $uploadedFileRecord->name = $validatedFile->getOriginalName();
        $uploadedFileRecord->description = $validatedDescription;
        
        
        $uploads[] = $uploadedFileRecord;
        
      } elseif (isset($file['id'])) {
        
        $uploadedFileRecord = Doctrine::getTable($this->getOption('model'))->findOneById($file['id']);
        
        
        if ($uploadedFileRecord) {
          
          $uploadedFileRecord->description = $validatedDescription;
          $uploads[] = $uploadedFileRecord;
        }
      }
      
      if ($this->getOption('max_count') && count($uploads) > $this->getOption('max_count')) {
        
        throw new sfValidatorError($this, 'max_count', array('value' => $value, 'max_count' => $this->getOption('max_count')));
        
      }
      
    }
    
    return $uploads;
  }
}
