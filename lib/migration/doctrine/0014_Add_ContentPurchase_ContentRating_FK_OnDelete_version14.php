<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version14 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropForeignKey('content_purchase', 'content_purchase_id_user_user_id');
        $this->dropForeignKey('content_rating', 'content_rating_user_id_user_id');
        $this->createForeignKey('content_purchase', 'content_purchase_id_user_user_id', array(
             'name' => 'content_purchase_id_user_user_id',
             'local' => 'id_user',
             'foreign' => 'id',
             'foreignTable' => 'user',
             'onUpdate' => '',
             'onDelete' => 'Cascade',
             ));
        $this->createForeignKey('content_rating', 'content_rating_user_id_user_id', array(
             'name' => 'content_rating_user_id_user_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'user',
             'onUpdate' => '',
             'onDelete' => 'Cascade',
             ));
        $this->addIndex('content_purchase', 'content_purchase_id_user', array(
             'fields' => 
             array(
              0 => 'id_user',
             ),
             ));
        $this->addIndex('content_rating', 'content_rating_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('content_purchase', 'content_purchase_id_user_user_id');
        $this->dropForeignKey('content_rating', 'content_rating_user_id_user_id');
        $this->createForeignKey('content_purchase', 'content_purchase_id_user_user_id', array(
             'name' => 'content_purchase_id_user_user_id',
             'local' => 'id_user',
             'foreign' => 'id',
             'foreignTable' => 'user',
             ));
        $this->createForeignKey('content_rating', 'content_rating_user_id_user_id', array(
             'name' => 'content_rating_user_id_user_id',
             'local' => 'user_id',
             'foreign' => 'id',
             'foreignTable' => 'user',
             ));
        $this->removeIndex('content_purchase', 'content_purchase_id_user', array(
             'fields' => 
             array(
              0 => 'id_user',
             ),
             ));
        $this->removeIndex('content_rating', 'content_rating_user_id', array(
             'fields' => 
             array(
              0 => 'user_id',
             ),
             ));
    }
}