<?php

/**
 * BaseUserRememberKey
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $remember_key
 * @property string $ip_address
 * @property User $User
 * 
 * @method integer         getId()           Returns the current record's "id" value
 * @method integer         getUserId()       Returns the current record's "user_id" value
 * @method string          getRememberKey()  Returns the current record's "remember_key" value
 * @method string          getIpAddress()    Returns the current record's "ip_address" value
 * @method User            getUser()         Returns the current record's "User" value
 * @method UserRememberKey setId()           Sets the current record's "id" value
 * @method UserRememberKey setUserId()       Sets the current record's "user_id" value
 * @method UserRememberKey setRememberKey()  Sets the current record's "remember_key" value
 * @method UserRememberKey setIpAddress()    Sets the current record's "ip_address" value
 * @method UserRememberKey setUser()         Sets the current record's "User" value
 * 
 * @package    read2read
 * @subpackage model
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserRememberKey extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_remember_key');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('remember_key', 'string', 32, array(
             'type' => 'string',
             'length' => 32,
             ));
        $this->hasColumn('ip_address', 'string', 50, array(
             'type' => 'string',
             'primary' => true,
             'length' => 50,
             ));

        $this->option('symfony', array(
             'form' => false,
             'filter' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}