<?php

/**
 * Period
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    read2read
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Period extends BasePeriod
{
    protected static $monthsNames = array(
        1 => 'Январь',
        'Февраль',
        'Март',
        'Апрель',
        'Май',
        'Июнь',
        'Июль',
        'Август',
        'Сентябрь',
        'Октябрь',
        'Ноябрь',
        'Декабрь'
    );

    /**
     * Returns current period instance
     *
     * @return <Doctrine_Object> instance of Period
     */
    public static function getCurrentPeriod()
    {
        $oPeriod = PeriodTable::getInstance()->findOneByDate(date('Y-m'));
        if (!($oPeriod instanceof Period)) {
            $oPeriod = new Period();
            $oPeriod->set1k('1.00');
            $oPeriod->setDate(date('Y-m'));
            $oPeriod->save();
            //throw new sfException('Cannot get current period. Error in DB data');
        }

        return $oPeriod;
    }

    /**
     * Returns Period Numeric value of the month
     * @return <ionteger> $monthNumeric
     */
    public function getMonthNumeric()
    {
        $dateArray = explode('-', $this->getDate());

        return $dateArray[1];
    }

    public function getYear()
    {
        $dateArray = explode('-', $this->getDate());

        return $dateArray[0];
    }

    /**
     * Returns rus name of the period month
     * @return <string> month name (rus)
     */
    public function getMonthString()
    {
        return self::$monthsNames[intval($this->getMonthNumeric())];
    }

    public function getVotes()
    {
        return VoteTable::getInstance()->getVotesList($this->getId());
    }
}
