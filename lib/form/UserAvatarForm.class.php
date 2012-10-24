<?php
class UserAvatarForm extends UserForm
{
    public function  configure()
    {
        $this->useFields(array('avatar'));
        $this->widgetSchema['avatar'] = new sfWidgetFormInputFile();

        $this->validatorSchema['avatar'] = new sfValidatorFile(array(
            'required' => false,
            'path' => sfConfig::get('sf_upload_dir') . sfConfig::get('app_avatars_path_dir'),
            'mime_types' => 'web_images',
        ));
    }


    public function processValues($values)
    {

        if ($values['avatar'] instanceof sfValidatedFile) { // file was uploaded
            $path = $this->getObject()->checkDir($values['avatar']->getPath(), $this->getObject()->getId());
            $values['avatar'] = $this->processPicture($values['avatar'], $path, 20000, 40000, false);
        }
        unset($values['avatar']);


        return parent::processValues($values);
    }

    protected function processPicture(sfValidatedFile $file, $path, $width, $height, $crop = false)
    {
        if (!$image = $this->getObject()->savePicture($file, $path, $width, $height, $crop)) {
            return false;
        }
        $user = $this->getObject();
        if ($user->getAvatar() !== null) {
            if (!unlink(sfConfig::get('sf_upload_dir') . sfConfig::get('app_avatars_path_dir') . $user->getAvatar())) {
                return false;
            }
        }

        $imageLocation = str_replace(
            sfConfig::get('sf_upload_dir') . sfConfig::get('app_avatars_path_dir'),
            '',
            $image
        );
        $user->setAvatar($imageLocation);
        $user->save();

    }
}