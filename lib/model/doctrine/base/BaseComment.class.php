<?php

/**
 * BaseComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_paragraph
 * @property clob $comment_ru
 * @property clob $comment_en
 * @property integer $ordered
 * @property Paragraph $Paragraph
 * 
 * @method integer   getIdParagraph()  Returns the current record's "id_paragraph" value
 * @method clob      getCommentRu()    Returns the current record's "comment_ru" value
 * @method clob      getCommentEn()    Returns the current record's "comment_en" value
 * @method integer   getOrdered()      Returns the current record's "ordered" value
 * @method Paragraph getParagraph()    Returns the current record's "Paragraph" value
 * @method Comment   setIdParagraph()  Sets the current record's "id_paragraph" value
 * @method Comment   setCommentRu()    Sets the current record's "comment_ru" value
 * @method Comment   setCommentEn()    Sets the current record's "comment_en" value
 * @method Comment   setOrdered()      Sets the current record's "ordered" value
 * @method Comment   setParagraph()    Sets the current record's "Paragraph" value
 * 
 * @package    read2read
 * @subpackage model
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseComment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('comment');
        $this->hasColumn('id_paragraph', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('comment_ru', 'clob', null, array(
             'type' => 'clob',
             'notnull' => true,
             ));
        $this->hasColumn('comment_en', 'clob', null, array(
             'type' => 'clob',
             'notnull' => true,
             ));
        $this->hasColumn('ordered', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             'length' => 4,
             ));

        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Paragraph', array(
             'local' => 'id_paragraph',
             'foreign' => 'id',
             'onDelete' => 'Cascade'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}