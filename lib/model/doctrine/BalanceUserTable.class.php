<?php

/**
 * BalanceUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BalanceUserTable extends Doctrine_Table
{
  /**
   * Enter description here...
   *
   * @param int $user_id
   * @param int $period_id
   * @return BalanceUser
   */
  static public function getByUserIdAndPeriodId($user_id, $period_id = 0)
  {
    if($period_id == 0) $period_id = Period::getCurrentPeriod()->getId();
    $q = Doctrine_Query::create()
          ->from('BalanceUser bu')
          ->where('bu.id_user=?', $user_id)
          ->andWhere('bu.id_period=?', $period_id)
          ->limit(1);
    $balance = $q->fetchOne();
    if(false === $balance)
    {
        BalanceUser::setInitialRecord($user_id, $period_id);
        $balance = self::getByUserIdAndPeriodId($user_id, $period_id);
        //throw new sfException('Cannot get Balance for User: '.$user_id.' period: '.$period_id.'. Error in DB data');
    }
    return $balance;
}


    /**
     * Returns an instance of this class.
     *
     * @return object BalanceUserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('BalanceUser');
    }
}