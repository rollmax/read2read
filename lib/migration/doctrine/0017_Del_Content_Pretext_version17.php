<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version17 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->removeColumn('content', 'pretext_ru');
        $this->removeColumn('content', 'pretext_en');
        $this->changeColumn('content', 'h_style', 'enum', '', array(
             'values' => 
             array(
              0 => 'none',
              1 => '1',
              2 => '2',
              3 => '3',
             ),
             'default' => 'none',
             ));
    }

    public function down()
    {
        $this->addColumn('content', 'pretext_ru', 'string', '2000', array(
             'notnull' => '1',
             ));
        $this->addColumn('content', 'pretext_en', 'string', '2000', array(
             'notnull' => '1',
             ));
        $this->changeColumn('content', 'h_style', 'enum', '', array(
                'values' =>
                array(
                    0 => 'none',
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                    6 => '6',
                ),
                'default' => 'none',
            ));
    }
}