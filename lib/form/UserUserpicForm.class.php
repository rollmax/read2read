<?php
class UserUserpicForm extends UserForm
{
  public function  configure()
  {
    $this->useFields(array('userpic'));
    $this->widgetSchema['userpic'] = new sfWidgetFormInputFile();

    $this->validatorSchema['userpic'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').sfConfig::get('app_userpic_path_dir'),
      'mime_types' => 'web_images',
    ));
  }

  
  public function processValues($values)
  {
    if ($values['userpic'] instanceof sfValidatedFile)
    { // file was uploaded

      $path = $this->getObject()->checkDir($values['userpic']->getPath(), $this->getObject()->getId());
      $values['userpic'] = $this->processPicture($values['userpic'], $path, 100, 100);
    }
    unset($values['userpic']);
    return parent::processValues($values);
  }

  protected function processPicture(sfValidatedFile $file, $path, $width, $height, $crop = false)
  {
    if(!$image = $this->getObject()->savePicture($file, $path, $width, $height, $crop))
      return false;
    $user = $this->getObject();
    if($user->getUserpic() !== null)
    {
      if(!unlink(sfConfig::get('sf_upload_dir').sfConfig::get('app_userpic_path_dir').$user->getUserpic()))
        return false;
    }

    $imageLocation = str_replace(sfConfig::get('sf_upload_dir').sfConfig::get('app_userpic_path_dir'), '', $image);
    $user->setUserpic($imageLocation);
    $user->save();
  }
}