<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version15 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropForeignKey('vote', 'vote_id_user_user_id');
        $this->dropForeignKey('voters', 'voters_id_user_user_id');
        $this->createForeignKey('vote', 'vote_id_user_user_id', array(
             'name' => 'vote_id_user_user_id',
             'local' => 'id_user',
             'foreign' => 'id',
             'foreignTable' => 'user',
             'onUpdate' => '',
             'onDelete' => 'Cascade',
             ));
        $this->createForeignKey('voters', 'voters_id_user_user_id', array(
             'name' => 'voters_id_user_user_id',
             'local' => 'id_user',
             'foreign' => 'id',
             'foreignTable' => 'user',
             'onUpdate' => '',
             'onDelete' => 'Cascade',
             ));
        $this->addIndex('vote', 'vote_id_user', array(
             'fields' => 
             array(
              0 => 'id_user',
             ),
             ));
        $this->addIndex('voters', 'voters_id_user', array(
             'fields' => 
             array(
              0 => 'id_user',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('vote', 'vote_id_user_user_id');
        $this->dropForeignKey('voters', 'voters_id_user_user_id');
        $this->createForeignKey('vote', 'vote_id_user_user_id', array(
             'name' => 'vote_id_user_user_id',
             'local' => 'id_user',
             'foreign' => 'id',
             'foreignTable' => 'user',
             ));
        $this->createForeignKey('voters', 'voters_id_user_user_id', array(
             'name' => 'voters_id_user_user_id',
             'local' => 'id_user',
             'foreign' => 'id',
             'foreignTable' => 'user',
             ));
        $this->removeIndex('vote', 'vote_id_user', array(
             'fields' => 
             array(
              0 => 'id_user',
             ),
             ));
        $this->removeIndex('voters', 'voters_id_user', array(
             'fields' => 
             array(
              0 => 'id_user',
             ),
             ));
    }
}