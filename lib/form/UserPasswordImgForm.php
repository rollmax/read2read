<?php
class UserPasswordImgForm extends UserForm
{
  public function  configure()
  {
    $this->useFields(array('img_file_name'));
    $this->widgetSchema['img_file_name'] = new sfWidgetFormInputFile();

    $this->validatorSchema['img_file_name'] = new sfValidatorFile(array(
      'required'   => true,
      'path'       => sfConfig::get('sf_upload_dir').sfConfig::get('app_secret_img_upload_path_dir'),
      'mime_types' => 'web_images',
    ));
  }
/*
  public function processValues($values)
  {
    
      die('b');
    
    if($values['img_file_name'] instanceof sfValidatedFile) {
      die('a');
      // file was uploaded
      die(var_dump($values['img_file_name']->getTempName()));
    }
    unset($values['img_file_name']);
    return parent::processValues($values);
  }
*/
}