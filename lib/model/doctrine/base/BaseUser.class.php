<?php

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $salt
 * @property string $password
 * @property string $login
 * @property string $email
 * @property string $phone
 * @property string $first_name
 * @property string $last_name
 * @property string $live_place
 * @property string $site
 * @property string $account_number
 * @property string $skype
 * @property string $resume_text
 * @property string $avatar
 * @property string $userpic
 * @property string $const_msg
 * @property string $activation_code
 * @property boolean $active
 * @property string $slug
 * @property decimal $weight
 * @property enum $utype
 * @property boolean $is_blocked
 * @property enum $tariff
 * @property enum $tariff_change
 * @property timestamp $tariff_change_date
 * @property decimal $balans
 * @property date $last_login
 * @property date $last_purchase
 * @property integer $sells
 * @property string $img_file_size
 * @property string $img_file_md5
 * @property string $img_file_name
 * @property Doctrine_Collection $groups
 * @property Doctrine_Collection $Content
 * @property Doctrine_Collection $ContentPurchase
 * @property Doctrine_Collection $ContentRating
 * @property Doctrine_Collection $BalanceUser
 * @property Doctrine_Collection $Topic
 * @property Doctrine_Collection $Post
 * @property Doctrine_Collection $User__Group
 * @property UserRememberKey $RememberKeys
 * @property Doctrine_Collection $Vote
 * @property Doctrine_Collection $Voters
 * 
 * @method string              getSalt()               Returns the current record's "salt" value
 * @method string              getPassword()           Returns the current record's "password" value
 * @method string              getLogin()              Returns the current record's "login" value
 * @method string              getEmail()              Returns the current record's "email" value
 * @method string              getPhone()              Returns the current record's "phone" value
 * @method string              getFirstName()          Returns the current record's "first_name" value
 * @method string              getLastName()           Returns the current record's "last_name" value
 * @method string              getLivePlace()          Returns the current record's "live_place" value
 * @method string              getSite()               Returns the current record's "site" value
 * @method string              getAccountNumber()      Returns the current record's "account_number" value
 * @method string              getSkype()              Returns the current record's "skype" value
 * @method string              getResumeText()         Returns the current record's "resume_text" value
 * @method string              getAvatar()             Returns the current record's "avatar" value
 * @method string              getUserpic()            Returns the current record's "userpic" value
 * @method string              getConstMsg()           Returns the current record's "const_msg" value
 * @method string              getActivationCode()     Returns the current record's "activation_code" value
 * @method boolean             getActive()             Returns the current record's "active" value
 * @method string              getSlug()               Returns the current record's "slug" value
 * @method decimal             getWeight()             Returns the current record's "weight" value
 * @method enum                getUtype()              Returns the current record's "utype" value
 * @method boolean             getIsBlocked()          Returns the current record's "is_blocked" value
 * @method enum                getTariff()             Returns the current record's "tariff" value
 * @method enum                getTariffChange()       Returns the current record's "tariff_change" value
 * @method timestamp           getTariffChangeDate()   Returns the current record's "tariff_change_date" value
 * @method decimal             getBalans()             Returns the current record's "balans" value
 * @method date                getLastLogin()          Returns the current record's "last_login" value
 * @method date                getLastPurchase()       Returns the current record's "last_purchase" value
 * @method integer             getSells()              Returns the current record's "sells" value
 * @method string              getImgFileSize()        Returns the current record's "img_file_size" value
 * @method string              getImgFileMd5()         Returns the current record's "img_file_md5" value
 * @method string              getImgFileName()        Returns the current record's "img_file_name" value
 * @method Doctrine_Collection getGroups()             Returns the current record's "groups" collection
 * @method Doctrine_Collection getContent()            Returns the current record's "Content" collection
 * @method Doctrine_Collection getContentPurchase()    Returns the current record's "ContentPurchase" collection
 * @method Doctrine_Collection getContentRating()      Returns the current record's "ContentRating" collection
 * @method Doctrine_Collection getBalanceUser()        Returns the current record's "BalanceUser" collection
 * @method Doctrine_Collection getTopic()              Returns the current record's "Topic" collection
 * @method Doctrine_Collection getPost()               Returns the current record's "Post" collection
 * @method Doctrine_Collection getUserGroup()          Returns the current record's "User__Group" collection
 * @method UserRememberKey     getRememberKeys()       Returns the current record's "RememberKeys" value
 * @method Doctrine_Collection getVote()               Returns the current record's "Vote" collection
 * @method Doctrine_Collection getVoters()             Returns the current record's "Voters" collection
 * @method User                setSalt()               Sets the current record's "salt" value
 * @method User                setPassword()           Sets the current record's "password" value
 * @method User                setLogin()              Sets the current record's "login" value
 * @method User                setEmail()              Sets the current record's "email" value
 * @method User                setPhone()              Sets the current record's "phone" value
 * @method User                setFirstName()          Sets the current record's "first_name" value
 * @method User                setLastName()           Sets the current record's "last_name" value
 * @method User                setLivePlace()          Sets the current record's "live_place" value
 * @method User                setSite()               Sets the current record's "site" value
 * @method User                setAccountNumber()      Sets the current record's "account_number" value
 * @method User                setSkype()              Sets the current record's "skype" value
 * @method User                setResumeText()         Sets the current record's "resume_text" value
 * @method User                setAvatar()             Sets the current record's "avatar" value
 * @method User                setUserpic()            Sets the current record's "userpic" value
 * @method User                setConstMsg()           Sets the current record's "const_msg" value
 * @method User                setActivationCode()     Sets the current record's "activation_code" value
 * @method User                setActive()             Sets the current record's "active" value
 * @method User                setSlug()               Sets the current record's "slug" value
 * @method User                setWeight()             Sets the current record's "weight" value
 * @method User                setUtype()              Sets the current record's "utype" value
 * @method User                setIsBlocked()          Sets the current record's "is_blocked" value
 * @method User                setTariff()             Sets the current record's "tariff" value
 * @method User                setTariffChange()       Sets the current record's "tariff_change" value
 * @method User                setTariffChangeDate()   Sets the current record's "tariff_change_date" value
 * @method User                setBalans()             Sets the current record's "balans" value
 * @method User                setLastLogin()          Sets the current record's "last_login" value
 * @method User                setLastPurchase()       Sets the current record's "last_purchase" value
 * @method User                setSells()              Sets the current record's "sells" value
 * @method User                setImgFileSize()        Sets the current record's "img_file_size" value
 * @method User                setImgFileMd5()         Sets the current record's "img_file_md5" value
 * @method User                setImgFileName()        Sets the current record's "img_file_name" value
 * @method User                setGroups()             Sets the current record's "groups" collection
 * @method User                setContent()            Sets the current record's "Content" collection
 * @method User                setContentPurchase()    Sets the current record's "ContentPurchase" collection
 * @method User                setContentRating()      Sets the current record's "ContentRating" collection
 * @method User                setBalanceUser()        Sets the current record's "BalanceUser" collection
 * @method User                setTopic()              Sets the current record's "Topic" collection
 * @method User                setPost()               Sets the current record's "Post" collection
 * @method User                setUserGroup()          Sets the current record's "User__Group" collection
 * @method User                setRememberKeys()       Sets the current record's "RememberKeys" value
 * @method User                setVote()               Sets the current record's "Vote" collection
 * @method User                setVoters()             Sets the current record's "Voters" collection
 * 
 * @package    read2read
 * @subpackage model
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user');
        $this->hasColumn('salt', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('password', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
        $this->hasColumn('login', 'string', 100, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('email', 'string', 80, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => 80,
             ));
        $this->hasColumn('phone', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('first_name', 'string', 80, array(
             'type' => 'string',
             'length' => 80,
             ));
        $this->hasColumn('last_name', 'string', 80, array(
             'type' => 'string',
             'length' => 80,
             ));
        $this->hasColumn('live_place', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('site', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('account_number', 'string', 20, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 20,
             ));
        $this->hasColumn('skype', 'string', 40, array(
             'type' => 'string',
             'length' => 40,
             ));
        $this->hasColumn('resume_text', 'string', 1000, array(
             'type' => 'string',
             'length' => 1000,
             ));
        $this->hasColumn('avatar', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('userpic', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('const_msg', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('activation_code', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('slug', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('weight', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             ));
        $this->hasColumn('utype', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'puser',
              1 => 'uuser',
              2 => 'suser',
             ),
             'default' => 'uuser',
             ));
        $this->hasColumn('is_blocked', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('tariff', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'none',
              1 => 'standart',
              2 => 'expert',
              3 => 'super',
             ),
             'default' => 'none',
             ));
        $this->hasColumn('tariff_change', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'none',
              1 => 'standart',
              2 => 'expert',
              3 => 'super',
             ),
             'default' => 'none',
             ));
        $this->hasColumn('tariff_change_date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('balans', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             ));
        $this->hasColumn('last_login', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('last_purchase', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('sells', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('img_file_size', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 0,
             ));
        $this->hasColumn('img_file_md5', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 0,
             ));
        $this->hasColumn('img_file_name', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 0,
             ));

        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('UserGroup as groups', array(
             'refClass' => 'User__Group',
             'local' => 'user_id',
             'foreign' => 'group_id'));

        $this->hasMany('Content', array(
             'local' => 'id',
             'foreign' => 'id_user'));

        $this->hasMany('ContentPurchase', array(
             'local' => 'id',
             'foreign' => 'id_user'));

        $this->hasMany('ContentRating', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('BalanceUser', array(
             'local' => 'id',
             'foreign' => 'id_user'));

        $this->hasMany('Topic', array(
             'local' => 'id',
             'foreign' => 'id_user'));

        $this->hasMany('Post', array(
             'local' => 'id',
             'foreign' => 'id_user'));

        $this->hasMany('User__Group', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('UserRememberKey as RememberKeys', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('Vote', array(
             'local' => 'id',
             'foreign' => 'id_user'));

        $this->hasMany('Voters', array(
             'local' => 'id',
             'foreign' => 'id_user'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $mysluggable0 = new Doctrine_Template_MySluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'login',
             ),
             'canUpdate' => true,
             'builder' => 
             array(
              0 => 'SlugifyClass',
              1 => 'Slugify',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($mysluggable0);
    }
}