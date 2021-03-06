<?php

/**
 * BaseContent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_user
 * @property integer $id_category
 * @property string $title_ru
 * @property string $title_en
 * @property string $author_ru
 * @property string $author_en
 * @property string $photo_ru
 * @property string $photo_en
 * @property enum $state
 * @property boolean $is_bold
 * @property boolean $is_italic
 * @property enum $h_style
 * @property boolean $is_blocked
 * @property boolean $is_moderated
 * @property boolean $to_delete
 * @property date $pub_date
 * @property integer $letters_k
 * @property boolean $is_free
 * @property integer $purchase_cnt
 * @property decimal $cont_rate
 * @property decimal $trans_rate
 * @property decimal $r2r_cont_rate
 * @property decimal $r2r_trans_rate
 * @property User $User
 * @property Category $Category
 * @property Doctrine_Collection $ContentPurchase
 * @property Doctrine_Collection $ContentRating
 * @property Doctrine_Collection $Paragraph
 * 
 * @method integer             getIdUser()          Returns the current record's "id_user" value
 * @method integer             getIdCategory()      Returns the current record's "id_category" value
 * @method string              getTitleRu()         Returns the current record's "title_ru" value
 * @method string              getTitleEn()         Returns the current record's "title_en" value
 * @method string              getAuthorRu()        Returns the current record's "author_ru" value
 * @method string              getAuthorEn()        Returns the current record's "author_en" value
 * @method string              getPhotoRu()         Returns the current record's "photo_ru" value
 * @method string              getPhotoEn()         Returns the current record's "photo_en" value
 * @method enum                getState()           Returns the current record's "state" value
 * @method boolean             getIsBold()          Returns the current record's "is_bold" value
 * @method boolean             getIsItalic()        Returns the current record's "is_italic" value
 * @method enum                getHStyle()          Returns the current record's "h_style" value
 * @method boolean             getIsBlocked()       Returns the current record's "is_blocked" value
 * @method boolean             getIsModerated()     Returns the current record's "is_moderated" value
 * @method boolean             getToDelete()        Returns the current record's "to_delete" value
 * @method date                getPubDate()         Returns the current record's "pub_date" value
 * @method integer             getLettersK()        Returns the current record's "letters_k" value
 * @method boolean             getIsFree()          Returns the current record's "is_free" value
 * @method integer             getPurchaseCnt()     Returns the current record's "purchase_cnt" value
 * @method decimal             getContRate()        Returns the current record's "cont_rate" value
 * @method decimal             getTransRate()       Returns the current record's "trans_rate" value
 * @method decimal             getR2rContRate()     Returns the current record's "r2r_cont_rate" value
 * @method decimal             getR2rTransRate()    Returns the current record's "r2r_trans_rate" value
 * @method User                getUser()            Returns the current record's "User" value
 * @method Category            getCategory()        Returns the current record's "Category" value
 * @method Doctrine_Collection getContentPurchase() Returns the current record's "ContentPurchase" collection
 * @method Doctrine_Collection getContentRating()   Returns the current record's "ContentRating" collection
 * @method Doctrine_Collection getParagraph()       Returns the current record's "Paragraph" collection
 * @method Content             setIdUser()          Sets the current record's "id_user" value
 * @method Content             setIdCategory()      Sets the current record's "id_category" value
 * @method Content             setTitleRu()         Sets the current record's "title_ru" value
 * @method Content             setTitleEn()         Sets the current record's "title_en" value
 * @method Content             setAuthorRu()        Sets the current record's "author_ru" value
 * @method Content             setAuthorEn()        Sets the current record's "author_en" value
 * @method Content             setPhotoRu()         Sets the current record's "photo_ru" value
 * @method Content             setPhotoEn()         Sets the current record's "photo_en" value
 * @method Content             setState()           Sets the current record's "state" value
 * @method Content             setIsBold()          Sets the current record's "is_bold" value
 * @method Content             setIsItalic()        Sets the current record's "is_italic" value
 * @method Content             setHStyle()          Sets the current record's "h_style" value
 * @method Content             setIsBlocked()       Sets the current record's "is_blocked" value
 * @method Content             setIsModerated()     Sets the current record's "is_moderated" value
 * @method Content             setToDelete()        Sets the current record's "to_delete" value
 * @method Content             setPubDate()         Sets the current record's "pub_date" value
 * @method Content             setLettersK()        Sets the current record's "letters_k" value
 * @method Content             setIsFree()          Sets the current record's "is_free" value
 * @method Content             setPurchaseCnt()     Sets the current record's "purchase_cnt" value
 * @method Content             setContRate()        Sets the current record's "cont_rate" value
 * @method Content             setTransRate()       Sets the current record's "trans_rate" value
 * @method Content             setR2rContRate()     Sets the current record's "r2r_cont_rate" value
 * @method Content             setR2rTransRate()    Sets the current record's "r2r_trans_rate" value
 * @method Content             setUser()            Sets the current record's "User" value
 * @method Content             setCategory()        Sets the current record's "Category" value
 * @method Content             setContentPurchase() Sets the current record's "ContentPurchase" collection
 * @method Content             setContentRating()   Sets the current record's "ContentRating" collection
 * @method Content             setParagraph()       Sets the current record's "Paragraph" collection
 * 
 * @package    read2read
 * @subpackage model
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseContent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('content');
        $this->hasColumn('id_user', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('id_category', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('title_ru', 'string', 1000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 1000,
             ));
        $this->hasColumn('title_en', 'string', 1000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 1000,
             ));
        $this->hasColumn('author_ru', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 200,
             ));
        $this->hasColumn('author_en', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 200,
             ));
        $this->hasColumn('photo_ru', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('photo_en', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('state', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'draft',
              1 => 'public',
              2 => 'deleted',
             ),
             'default' => 'draft',
             ));
        $this->hasColumn('is_bold', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('is_italic', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('h_style', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'none',
              1 => 1,
              2 => 2,
              3 => 3,
             ),
             'default' => 'none',
             ));
        $this->hasColumn('is_blocked', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('is_moderated', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('to_delete', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('pub_date', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('letters_k', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('is_free', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('purchase_cnt', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('cont_rate', 'decimal', 6, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             'length' => 6,
             ));
        $this->hasColumn('trans_rate', 'decimal', 6, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             'length' => 6,
             ));
        $this->hasColumn('r2r_cont_rate', 'decimal', 6, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             'length' => 6,
             ));
        $this->hasColumn('r2r_trans_rate', 'decimal', 6, array(
             'type' => 'decimal',
             'scale' => 2,
             'notnull' => true,
             'length' => 6,
             ));


        $this->index('state_id_user_idx', array(
             'fields' => 
             array(
              0 => 'state',
              1 => 'id_user',
             ),
             ));
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'id_user',
             'foreign' => 'id',
             'onDelete' => 'Cascade'));

        $this->hasOne('Category', array(
             'local' => 'id_category',
             'foreign' => 'id'));

        $this->hasMany('ContentPurchase', array(
             'local' => 'id',
             'foreign' => 'id_content'));

        $this->hasMany('ContentRating', array(
             'local' => 'id',
             'foreign' => 'content_id'));

        $this->hasMany('Paragraph', array(
             'local' => 'id',
             'foreign' => 'id_content'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}