<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version16 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('balance_user', 'was_paid_id', 'integer', '8', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('balance_user', 'was_paid_id');
    }
}