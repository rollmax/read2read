<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aleksxor
 * Date: 17.10.12
 * Time: 17:39
 */


class ProcessMPForm extends sfForm
{

    public function configure()
    {
        $this->widgetSchema['mpfile'] = new sfWidgetFormInputFile();
        $this->validatorSchema['mpfile'] = new sfValidatorFile(array(
            'required' => true
        ));
    }
}
