<?php

/**
 * BaseBalanceUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_user
 * @property integer $id_period
 * @property decimal $add_funds
 * @property decimal $use_payment
 * @property integer $sell_purchase_cnt
 * @property decimal $amount
 * @property decimal $payable
 * @property User $User
 * @property Period $Period
 * 
 * @method integer     getIdUser()            Returns the current record's "id_user" value
 * @method integer     getIdPeriod()          Returns the current record's "id_period" value
 * @method decimal     getAddFunds()          Returns the current record's "add_funds" value
 * @method decimal     getUsePayment()        Returns the current record's "use_payment" value
 * @method integer     getSellPurchaseCnt()   Returns the current record's "sell_purchase_cnt" value
 * @method decimal     getAmount()            Returns the current record's "amount" value
 * @method decimal     getPayable()           Returns the current record's "payable" value
 * @method User        getUser()              Returns the current record's "User" value
 * @method Period      getPeriod()            Returns the current record's "Period" value
 * @method BalanceUser setIdUser()            Sets the current record's "id_user" value
 * @method BalanceUser setIdPeriod()          Sets the current record's "id_period" value
 * @method BalanceUser setAddFunds()          Sets the current record's "add_funds" value
 * @method BalanceUser setUsePayment()        Sets the current record's "use_payment" value
 * @method BalanceUser setSellPurchaseCnt()   Sets the current record's "sell_purchase_cnt" value
 * @method BalanceUser setAmount()            Sets the current record's "amount" value
 * @method BalanceUser setPayable()           Sets the current record's "payable" value
 * @method BalanceUser setUser()              Sets the current record's "User" value
 * @method BalanceUser setPeriod()            Sets the current record's "Period" value
 * 
 * @package    read2read
 * @subpackage model
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBalanceUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('balance_user');
        $this->hasColumn('id_user', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('id_period', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('add_funds', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             ));
        $this->hasColumn('use_payment', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             ));
        $this->hasColumn('sell_purchase_cnt', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('amount', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             ));
        $this->hasColumn('payable', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'id_user',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Period', array(
             'local' => 'id_period',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}