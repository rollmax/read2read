<?php

/**
 * BasePage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_page
 * @property string $title
 * @property string $name
 * @property string $url
 * @property clob $content
 * @property Page $Parent
 * @property Doctrine_Collection $SubPage
 * 
 * @method integer             getIdPage()  Returns the current record's "id_page" value
 * @method string              getTitle()   Returns the current record's "title" value
 * @method string              getName()    Returns the current record's "name" value
 * @method string              getUrl()     Returns the current record's "url" value
 * @method clob                getContent() Returns the current record's "content" value
 * @method Page                getParent()  Returns the current record's "Parent" value
 * @method Doctrine_Collection getSubPage() Returns the current record's "SubPage" collection
 * @method Page                setIdPage()  Sets the current record's "id_page" value
 * @method Page                setTitle()   Sets the current record's "title" value
 * @method Page                setName()    Sets the current record's "name" value
 * @method Page                setUrl()     Sets the current record's "url" value
 * @method Page                setContent() Sets the current record's "content" value
 * @method Page                setParent()  Sets the current record's "Parent" value
 * @method Page                setSubPage() Sets the current record's "SubPage" collection
 * 
 * @package    read2read
 * @subpackage model
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('page');
        $this->hasColumn('id_page', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('title', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 100,
             ));
        $this->hasColumn('url', 'string', 40, array(
             'type' => 'string',
             'unique' => true,
             'length' => 40,
             ));
        $this->hasColumn('content', 'clob', null, array(
             'type' => 'clob',
             'notnull' => true,
             ));

        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Page as Parent', array(
             'local' => 'id_page',
             'foreign' => 'id'));

        $this->hasMany('Page as SubPage', array(
             'local' => 'id',
             'foreign' => 'id_page'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}