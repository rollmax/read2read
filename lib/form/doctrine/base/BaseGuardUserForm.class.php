<?php

/**
 * GuardUser form base class.
 *
 * @method GuardUser getObject() Returns the current form's model object
 *
 * @package    read2read
 * @subpackage form
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGuardUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'salt'               => new sfWidgetFormInputText(),
      'password'           => new sfWidgetFormInputText(),
      'login'              => new sfWidgetFormInputText(),
      'email'              => new sfWidgetFormInputText(),
      'phone'              => new sfWidgetFormInputText(),
      'first_name'         => new sfWidgetFormInputText(),
      'last_name'          => new sfWidgetFormInputText(),
      'live_place'         => new sfWidgetFormInputText(),
      'site'               => new sfWidgetFormInputText(),
      'account_number'     => new sfWidgetFormInputText(),
      'skype'              => new sfWidgetFormInputText(),
      'resume_text'        => new sfWidgetFormTextarea(),
      'avatar'             => new sfWidgetFormInputText(),
      'userpic'            => new sfWidgetFormInputText(),
      'const_msg'          => new sfWidgetFormInputText(),
      'activation_code'    => new sfWidgetFormInputText(),
      'active'             => new sfWidgetFormInputCheckbox(),
      'slug'               => new sfWidgetFormInputText(),
      'weight'             => new sfWidgetFormInputText(),
      'utype'              => new sfWidgetFormChoice(array('choices' => array('puser' => 'puser', 'uuser' => 'uuser', 'suser' => 'suser'))),
      'is_blocked'         => new sfWidgetFormInputCheckbox(),
      'tariff'             => new sfWidgetFormChoice(array('choices' => array('none' => 'none', 'standart' => 'standart', 'expert' => 'expert', 'super' => 'super'))),
      'tariff_change'      => new sfWidgetFormChoice(array('choices' => array('none' => 'none', 'standart' => 'standart', 'expert' => 'expert', 'super' => 'super'))),
      'tariff_change_date' => new sfWidgetFormDateTime(),
      'balans'             => new sfWidgetFormInputText(),
      'last_login'         => new sfWidgetFormDate(),
      'last_purchase'      => new sfWidgetFormDate(),
      'sells'              => new sfWidgetFormInputText(),
      'img_file_size'      => new sfWidgetFormTextarea(),
      'img_file_md5'       => new sfWidgetFormTextarea(),
      'img_file_name'      => new sfWidgetFormTextarea(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'groups_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'UserGroup')),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'salt'               => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'password'           => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'login'              => new sfValidatorString(array('max_length' => 100)),
      'email'              => new sfValidatorString(array('max_length' => 80)),
      'phone'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'first_name'         => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'last_name'          => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'live_place'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'site'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'account_number'     => new sfValidatorString(array('max_length' => 20)),
      'skype'              => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'resume_text'        => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'avatar'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'userpic'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'const_msg'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'activation_code'    => new sfValidatorString(array('max_length' => 50)),
      'active'             => new sfValidatorBoolean(array('required' => false)),
      'slug'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'weight'             => new sfValidatorNumber(),
      'utype'              => new sfValidatorChoice(array('choices' => array(0 => 'puser', 1 => 'uuser', 2 => 'suser'), 'required' => false)),
      'is_blocked'         => new sfValidatorBoolean(array('required' => false)),
      'tariff'             => new sfValidatorChoice(array('choices' => array(0 => 'none', 1 => 'standart', 2 => 'expert', 3 => 'super'), 'required' => false)),
      'tariff_change'      => new sfValidatorChoice(array('choices' => array(0 => 'none', 1 => 'standart', 2 => 'expert', 3 => 'super'), 'required' => false)),
      'tariff_change_date' => new sfValidatorDateTime(array('required' => false)),
      'balans'             => new sfValidatorNumber(),
      'last_login'         => new sfValidatorDate(),
      'last_purchase'      => new sfValidatorDate(),
      'sells'              => new sfValidatorInteger(),
      'img_file_size'      => new sfValidatorString(),
      'img_file_md5'       => new sfValidatorString(),
      'img_file_name'      => new sfValidatorString(),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(),
      'groups_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'UserGroup', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'GuardUser', 'column' => array('login'))),
        new sfValidatorDoctrineUnique(array('model' => 'GuardUser', 'column' => array('email'))),
        new sfValidatorDoctrineUnique(array('model' => 'GuardUser', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('guard_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GuardUser';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['groups_list']))
    {
      $this->setDefault('groups_list', $this->object->groups->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savegroupsList($con);

    parent::doSave($con);
  }

  public function savegroupsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['groups_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->groups->getPrimaryKeys();
    $values = $this->getValue('groups_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('groups', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('groups', array_values($link));
    }
  }

}
