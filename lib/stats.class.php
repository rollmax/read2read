<?php
/**
 * Slass StatsClass
 *
 * @package    read2read
 * @subpackage lib
 * @author     aSoft4Web Team <info@asoft4web.com>
 * @version    SVN: $Id:  $
 */

class StatsClass
{

    /**
     * U_User посмотрел категорию. Учитываем только один заход за день
     *
     * @param int $iUserId
     * @param int $iCategoryId
     */
    public static function uuserViewCategory($iUserId = 0, $iCategoryId = 0)
    {
        $q = Doctrine_Query::create()
            ->select('sc.user_id')
            ->from('StatisticsCategory sc')
            ->where('sc.visit_date = CURDATE()')
            ->andWhere('sc.category_id = ?', $iCategoryId)
            ->andWhere('sc.user_id = ?', $iUserId)
            ->limit(1);
        if (false !== $q->fetchOne()) {
            return;
        } // No first visit
        // New u_user
        $oStatsCategory = new StatisticsCategory();
        $oStatsCategory->setCategoryId($iCategoryId);
        $oStatsCategory->setUserId($iUserId);
        $oStatsCategory->setVisitDate(date('Y-m-d'));
        $oStatsCategory->save();

        // Update category stats
        $oStatistics = StatisticsTable::getInstance()->getFullStatistics(Period::getCurrentPeriod(), $iCategoryId);
        if (!($oStatistics instanceof Statistics)) {
            throw new sfException('Cannon get Statistics object');
        }
        $callMethodGet = 'get' . date('j') . 'Login';
        ;
        $callMethodSet = 'set' . date('j') . 'Login';
        $oStatistics->{$callMethodSet}($oStatistics->{$callMethodGet}() + 1);
        $oStatistics->save();
    }

    /**
     * Returt Top 5 Authors by Period and category
     *
     * @param Period $period
     * @param int $category_id
     * @return Doctrine_Collection
     */
    public function getTopAuthors(Period $period = null, $iCategoryId = 0)
    {
        if ($iCategoryId == 0) {
            $q = UserTable::addPUserQuery();
            $q = UserTable::addActiveQuery($q);
            $q->andWhere($q->getRootAlias() . '.sells > ?', 0)
                ->orderBy($q->getRootAlias() . '.sells DESC');
        } else {
            $q = Doctrine_Query::create()
                ->select('u.*, sum(c.purchase_cnt) as sells')
                ->from('User u')
                ->innerJoin('u.Content c')
                ->groupBy('c.id_user')
                ->orderBy('u.sells')
                ->where('c.id_category=?', $iCategoryId)
                ->andWhere('sells > ?', 0);

            $q = UserTable::addPUserQuery($q);
            $q = UserTable::addActiveQuery($q);
        }

        $q->limit(5);

        return $q->execute();
    }

    /**
     * Return 5 top articles by R2R votes
     *
     * @param Period $period
     * @return array -  $array[i]['acticle'] - instance of <Content>
     *                  $array[i]['en'] - <float> size
     *                  $array[i]['ru'] - <float> size
     */
    public function getTopR2RArticles(Period $period = null)
    {
        $stats = array();

        $q = Doctrine_Query::create()
            ->from('Content cont')
            ->where('cont.state=?', 'public')
            ->orderBy('cont.r2r_cont_rate DESC')
            ->orderBy('cont.r2r_trans_rate DESC')
            ->limit(5);

        $q = ContentTable::addNoBlockedContent($q);

        return $q->execute();
    }

    /**
     * Return 5 top articles by readers votes
     *
     * @param Period $period
     * @return array -  $array[i]['acticle'] - instance of <Content>
     *                  $array[i]['en'] - <float> size
     *                  $array[i]['ru'] - <float> size
     */
    public function getTopReadersArticles(Period $period = null)
    {

        $q = Doctrine_Query::create()
            ->from('Content cont')
            ->where('cont.state=?', 'public')
            ->orderBy('cont.cont_rate DESC')
            ->orderBy('cont.trans_rate DESC')
            ->limit(5);
        $q = ContentTable::addNoBlockedContent($q);

        return $q->execute();
    }

    /**
     * Returns collection of the 5 smallest articles
     *
     * @param Period $period
     * @return Doctrine_Collection
     */
    public function getWorseSizeArticles(Period $period = null)
    {
        $q = Doctrine_Query::create()
            ->from('Content cont')
            ->where('cont.state=?', 'public')
            ->orderBy('cont.letters_k ASC')
            ->limit(5);
        $q = ContentTable::addNoBlockedContent($q);

        return $q->execute();
    }

    /**
     * Returns collection of the 5 biggest articles
     *
     * @param Period $period
     * @return Doctrine_Collection
     */
    public function getTopSizeArticles(Period $period = null)
    {
        $q = Doctrine_Query::create()
            ->from('Content cont')
            ->where('cont.state=?', 'public')
            ->orderBy('cont.letters_k DESC')
            ->limit(5);
        $q = ContentTable::addNoBlockedContent($q);

        return $q->execute();
    }

    /**
     * Return top 5 sales articles
     *
     * @return array -  $array[i]['acticle'] - instance of <Content>
     *                  $array[i]['sales'] - <int> sales count
     */
    public function getTopSalesArticles(Period $period = null)
    {

        $q = Doctrine_Query::create()
            ->from('Content cont')
            ->where('cont.state=?', 'public')
            ->andWhere('cont.purchase_cnt > ?', 0)
            ->orderBy('cont.purchase_cnt DESC')
            ->limit(5);
        $q = ContentTable::addNoBlockedContent($q);

        return $q->execute();
    }

    /**
     * Return top 5 sales Categories
     *
     * @param Period $period
     * @return array -  $array[i]['category'] - instance of <Category>
     *                  $array[i]['sales'] - <int> sales count
     */
    public function getTopSalesCategories(Period $period = null)
    {

        $q = Doctrine_Query::create()
            ->from('Category cat')
            ->andWhere('cat.purchase_cnt > ?', 0)
            ->orderBy('cat.purchase_cnt DESC')
            ->limit(5);

        return $q->execute();
    }

}