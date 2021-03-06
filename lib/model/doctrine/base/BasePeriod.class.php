<?php

/**
 * BasePeriod
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property decimal $1k
 * @property string $date
 * @property decimal $r2r_share
 * @property Doctrine_Collection $ContentRating
 * @property Doctrine_Collection $BalanceUser
 * @property Doctrine_Collection $BalanceSystem
 * @property Doctrine_Collection $Transaction
 * @property Doctrine_Collection $Statistics
 * @property Doctrine_Collection $Vote
 * 
 * @method decimal             get1k()            Returns the current record's "1k" value
 * @method string              getDate()          Returns the current record's "date" value
 * @method decimal             getR2rShare()      Returns the current record's "r2r_share" value
 * @method Doctrine_Collection getContentRating() Returns the current record's "ContentRating" collection
 * @method Doctrine_Collection getBalanceUser()   Returns the current record's "BalanceUser" collection
 * @method Doctrine_Collection getBalanceSystem() Returns the current record's "BalanceSystem" collection
 * @method Doctrine_Collection getTransaction()   Returns the current record's "Transaction" collection
 * @method Doctrine_Collection getStatistics()    Returns the current record's "Statistics" collection
 * @method Doctrine_Collection getVote()          Returns the current record's "Vote" collection
 * @method Period              set1k()            Sets the current record's "1k" value
 * @method Period              setDate()          Sets the current record's "date" value
 * @method Period              setR2rShare()      Sets the current record's "r2r_share" value
 * @method Period              setContentRating() Sets the current record's "ContentRating" collection
 * @method Period              setBalanceUser()   Sets the current record's "BalanceUser" collection
 * @method Period              setBalanceSystem() Sets the current record's "BalanceSystem" collection
 * @method Period              setTransaction()   Sets the current record's "Transaction" collection
 * @method Period              setStatistics()    Sets the current record's "Statistics" collection
 * @method Period              setVote()          Sets the current record's "Vote" collection
 * 
 * @package    read2read
 * @subpackage model
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePeriod extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('period');
        $this->hasColumn('1k', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             ));
        $this->hasColumn('date', 'string', 7, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 7,
             ));
        $this->hasColumn('r2r_share', 'decimal', null, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             ));


        $this->index('date', array(
             'fields' => 'date',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('ContentRating', array(
             'local' => 'id',
             'foreign' => 'period_id'));

        $this->hasMany('BalanceUser', array(
             'local' => 'id',
             'foreign' => 'id_period'));

        $this->hasMany('BalanceSystem', array(
             'local' => 'id',
             'foreign' => 'id_period'));

        $this->hasMany('Transaction', array(
             'local' => 'id',
             'foreign' => 'id_period'));

        $this->hasMany('Statistics', array(
             'local' => 'id',
             'foreign' => 'period_id'));

        $this->hasMany('Vote', array(
             'local' => 'id',
             'foreign' => 'id_period'));
    }
}