<?php
class BackendPageForm extends BasePageForm
{
  public function configure()
  {
    $this->removeFields();
    $this->widgetSchema['content'] = new sfWidgetFormCKEditor();
    
  }

  protected function removeFields()
  {
    unset( $this['created_at'], $this['updated_at'] );
  }

}