<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version10 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('balance_user', 'was_paid', 'boolean', '25', array(
             'notnull' => '1',
             'default' => '0',
             ));
        $this->addColumn('balance_user', 'was_paid_amount', 'decimal', '18', array(
             'scale' => '2',
             'notnull' => '1',
             ));
    }

    public function down()
    {
        $this->removeColumn('balance_user', 'was_paid');
        $this->removeColumn('balance_user', 'was_paid_amount');
    }
}