<?php

/**
 * BaseRoom
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $description
 * @property Doctrine_Collection $Topic
 * 
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method Doctrine_Collection getTopic()       Returns the current record's "Topic" collection
 * @method Room                setName()        Sets the current record's "name" value
 * @method Room                setDescription() Sets the current record's "description" value
 * @method Room                setTopic()       Sets the current record's "Topic" collection
 * 
 * @package    read2read
 * @subpackage model
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRoom extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('room');
        $this->hasColumn('name', 'string', 55, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 55,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));

        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Topic', array(
             'local' => 'id',
             'foreign' => 'id_room'));
    }
}