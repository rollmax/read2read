<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aleksxor
 * Date: 19.09.12
 * Time: 13:54
 */


class ArticleParagraphPicForm extends ParagraphForm
{

    public function configure()
    {
        $this->useFields(array('photo_en', 'photo_ru'));

        $this->widgetSchema['photo_en'] = new sfWidgetFormInputFile(array(
            'label' => 'Картинка для текста на английском',
        ));

        $this->widgetSchema['photo_ru'] = new sfWidgetFormInputFile(array(
            'label' => 'Картинка для текста на русском',
        ));

        $this->validatorSchema['photo_en'] = new sfValidatorFile(array(
            'required' => false,
            'path' => sfConfig::get('sf_upload_dir').'/articles/en',
            'mime_types' => 'web_images',
        ));

        $this->validatorSchema['photo_ru'] = new sfValidatorFile(array(
            'required' => false,
            'path' => sfConfig::get('sf_upload_dir').'/articles/ru',
            'mime_types' => 'web_images',
        ));

    }
}
