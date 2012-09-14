<?php

/**
 * GuardUser filter form base class.
 *
 * @package    read2read
 * @subpackage filter
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGuardUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'salt'               => new sfWidgetFormFilterInput(),
      'password'           => new sfWidgetFormFilterInput(),
      'login'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_email'      => new sfWidgetFormFilterInput(),
      'phone'              => new sfWidgetFormFilterInput(),
      'first_name'         => new sfWidgetFormFilterInput(),
      'last_name'          => new sfWidgetFormFilterInput(),
      'live_place'         => new sfWidgetFormFilterInput(),
      'site'               => new sfWidgetFormFilterInput(),
      'account_number'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'skype'              => new sfWidgetFormFilterInput(),
      'resume_text'        => new sfWidgetFormFilterInput(),
      'avatar'             => new sfWidgetFormFilterInput(),
      'userpic'            => new sfWidgetFormFilterInput(),
      'const_msg'          => new sfWidgetFormFilterInput(),
      'activation_code'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'active'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'slug'               => new sfWidgetFormFilterInput(),
      'weight'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'utype'              => new sfWidgetFormChoice(array('choices' => array('' => '', 'puser' => 'puser', 'uuser' => 'uuser', 'suser' => 'suser'))),
      'is_blocked'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tariff'             => new sfWidgetFormChoice(array('choices' => array('' => '', 'none' => 'none', 'standart' => 'standart', 'expert' => 'expert', 'super' => 'super'))),
      'tariff_change'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'none' => 'none', 'standart' => 'standart', 'expert' => 'expert', 'super' => 'super'))),
      'tariff_change_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'balans'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_login'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'last_purchase'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'sells'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'img_file_size'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'img_file_md5'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'img_file_name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'groups_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'UserGroup')),
    ));

    $this->setValidators(array(
      'salt'               => new sfValidatorPass(array('required' => false)),
      'password'           => new sfValidatorPass(array('required' => false)),
      'login'              => new sfValidatorPass(array('required' => false)),
      'email'              => new sfValidatorPass(array('required' => false)),
      'contact_email'      => new sfValidatorPass(array('required' => false)),
      'phone'              => new sfValidatorPass(array('required' => false)),
      'first_name'         => new sfValidatorPass(array('required' => false)),
      'last_name'          => new sfValidatorPass(array('required' => false)),
      'live_place'         => new sfValidatorPass(array('required' => false)),
      'site'               => new sfValidatorPass(array('required' => false)),
      'account_number'     => new sfValidatorPass(array('required' => false)),
      'skype'              => new sfValidatorPass(array('required' => false)),
      'resume_text'        => new sfValidatorPass(array('required' => false)),
      'avatar'             => new sfValidatorPass(array('required' => false)),
      'userpic'            => new sfValidatorPass(array('required' => false)),
      'const_msg'          => new sfValidatorPass(array('required' => false)),
      'activation_code'    => new sfValidatorPass(array('required' => false)),
      'active'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'slug'               => new sfValidatorPass(array('required' => false)),
      'weight'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'utype'              => new sfValidatorChoice(array('required' => false, 'choices' => array('puser' => 'puser', 'uuser' => 'uuser', 'suser' => 'suser'))),
      'is_blocked'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tariff'             => new sfValidatorChoice(array('required' => false, 'choices' => array('none' => 'none', 'standart' => 'standart', 'expert' => 'expert', 'super' => 'super'))),
      'tariff_change'      => new sfValidatorChoice(array('required' => false, 'choices' => array('none' => 'none', 'standart' => 'standart', 'expert' => 'expert', 'super' => 'super'))),
      'tariff_change_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'balans'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'last_login'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'last_purchase'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'sells'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'img_file_size'      => new sfValidatorPass(array('required' => false)),
      'img_file_md5'       => new sfValidatorPass(array('required' => false)),
      'img_file_name'      => new sfValidatorPass(array('required' => false)),
      'created_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'groups_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'UserGroup', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('guard_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addGroupsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.User__Group User__Group')
      ->andWhereIn('User__Group.group_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'GuardUser';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'salt'               => 'Text',
      'password'           => 'Text',
      'login'              => 'Text',
      'email'              => 'Text',
      'contact_email'      => 'Text',
      'phone'              => 'Text',
      'first_name'         => 'Text',
      'last_name'          => 'Text',
      'live_place'         => 'Text',
      'site'               => 'Text',
      'account_number'     => 'Text',
      'skype'              => 'Text',
      'resume_text'        => 'Text',
      'avatar'             => 'Text',
      'userpic'            => 'Text',
      'const_msg'          => 'Text',
      'activation_code'    => 'Text',
      'active'             => 'Boolean',
      'slug'               => 'Text',
      'weight'             => 'Number',
      'utype'              => 'Enum',
      'is_blocked'         => 'Boolean',
      'tariff'             => 'Enum',
      'tariff_change'      => 'Enum',
      'tariff_change_date' => 'Date',
      'balans'             => 'Number',
      'last_login'         => 'Date',
      'last_purchase'      => 'Date',
      'sells'              => 'Number',
      'img_file_size'      => 'Text',
      'img_file_md5'       => 'Text',
      'img_file_name'      => 'Text',
      'created_at'         => 'Date',
      'updated_at'         => 'Date',
      'groups_list'        => 'ManyKey',
    );
  }
}
