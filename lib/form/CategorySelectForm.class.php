<?php
class CategorySelectForm extends BaseForm
{

  public function configure()
  {
    // id_category
    $this->widgetSchema['id_category'] = new sfWidgetFormDoctrineChoice(array(
        'model' => 'Category',
        'method'=> 'getNameLanguages',
        'order_by' => array('ordered', 'asc')
    ));

    $this->validatorSchema['id_category'] = new sfValidatorDoctrineChoice(array(
        'model' => 'Category',
        'required' => true
    ));

    $this->widgetSchema->setNameFormat('category[%s]');

  }

}
