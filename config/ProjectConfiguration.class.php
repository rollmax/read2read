<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->setWebDir( $this->getRootDir() );

    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('tsUploadPlugin');

    sfValidatorBase::setDefaultMessage('required', 'Не должно быть пустым');
    sfValidatorBase::setDefaultMessage('invalid', 'Введите корректное значение');
    $this->enablePlugins('sfJqueryReloadedPlugin');
    $this->enablePlugins('sfAdminDashPlugin');

    $this->enablePlugins('sfCKEditorPlugin');
  }
  
  public function configureDoctrine(Doctrine_Manager $manager)
  {
    $manager->setCharset('utf8');
    $manager->setCollate('utf8_general_ci');
  }

}
