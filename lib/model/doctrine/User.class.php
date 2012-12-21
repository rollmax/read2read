<?php

/**
 * User
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    read2read
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class User extends GuardUser
{
    const STANDART = 'standart';
    const EXPERT = 'expert';
    const SUPER = 'super';

    public static $tariffs = array(
        User::STANDART => 'Стандарт',
        User::EXPERT => 'Эксперт',
        User::SUPER => 'Супер',
    );

    /**
     * return User login
     * @return <string> login
     */
    public function  __toString()
    {
        return $this->getLogin();
    }

    public function getContent()
    {
        $q = ContentTable::getInstance()->addContentPublishedListQuery();
        $q->andWhere('cont.id_user=?', $this->getId());

        return $q->execute();
    }

    public function getTariffString()
    {
        return self::$tariffs[$this->tariff];
    }

    public function  getTariffChangeString()
    {
        return self::$tariffs[$this->getTariffChange()];
    }

    /**
     * Return TRUE if Statics is enabled
     *
     * @return bool
     */
    public function isEnableStatics()
    {
        if ($this->getIsBlocked()) {
            return false;
        }
        if ($this->getTariff() == 'expert' || $this->getTariff() == 'super') {
            return true;
        }

        return false;
    }

    /**
     * Return TRUE if 1K voting is enabled
     *
     * @return bool
     */
    public function isEnableVote1k()
    {
        if ($this->getIsBlocked()) {
            return false;
        }

//    if( $this->getTariff()=='expert' || $this->getTariff()=='super' ) return true;
        return true;
    }

    /**
     * Return TRUE is this article was purchased by this user
     *
     * @param int $article_id
     * @return bool
     */
    public function isPurchaseArticle($article_id = 0)
    {
        $res = ContentPurchaseTable::getInstance()->isUserArticle(
            array(
                'id_content' => $article_id,
                'id_user' => $this->getId()
            )
        );
        if ($res == $this->getId()) {
            return true;
        }

        return false;
    }

    public function setNewTariff($tariffName)
    {
        if ($this->getTariff() == $tariffName && $this->getTariffChange() == 'none') {
            return true;
        } else {
            if ($this->getTariff() == $tariffName && $this->getTariffChange() != 'none'
            ) // set $tariffName to none and it will updates in database at the next steps
            {
                $tariffName = 'none';
            }
        }

        $this->setTariffChange($tariffName);
        $this->setTariffChangeDate(date('Y-m-d H:i:s'));
        $this->save();

        if ($this->getId()) {
            return true;
        }

        return false;
    }

    public function getAvatarFullPath()
    {
        return ($this->getAvatar() !== null) ? sfConfig::get('app_avatars_url_dir') . $this->getAvatar() : false;
    }

    public function getUserpicFullPath()
    {
        return ($this->getUserpic() !== null) ? sfConfig::get('app_userpic_url_dir') . $this->getUserpic(
        ) : sfConfig::get('app_userpic_url_dir') . sfConfig::get('app_default_userpic_url');
    }

    /**
     * Returns user const_msg or default message from configs for user panel
     * @return <string>
     */
    public function  getConstMsgUserPanel()
    {
        if (null !== $this->getConstMsg() || '' != $this->getConstMsg()) {
            return $this->getConstMsg();
        } else {
            return sfConfig::get('app_default_const_msg');
        }
    }

    /**
     * Returns user const_msg or default message from configs for forum
     * @return <string>
     */
    public function  getConstMsgForum()
    {
        if (null !== $this->getConstMsg()) {
            return $this->getConstMsg();
        } else {
            return sfConfig::get('app_default_const_msg_room');
        }
    }

    public function checkDir($path, $id)
    {
        return ReadToRead::checkDir($path, $id);
    }

    public function savePicture(sfValidatedFile $file, $path, $width, $height, $crop)
    {
        return ReadToRead::savePicture($file, $path, $width, $height, $crop);
    }

    /**
     * Returns User ContentPurchase categories
     *
     * @return <DoctrineCollection> ContentPurchase
     */
    public function getPurchaseCategories()
    {
        $q = Doctrine_Query::create()
            ->select('cp.*, c.*')
            ->from('ContentPurchase cp')
            ->innerJoin('cp.Category c')
            ->where('cp.id_user=?', $this->getId())
            ->groupBy('cp.id_category');

        return $q->execute();
    }

    /**
     * Returns Array of purchases where category equals categoryId
     * @param <integer> $categoryId
     * @return <bool> false || <DoctrineCollection> $purchases
     */
    public function  getPurchaseContentByCategory($categoryId = null)
    {
        $categoryIds = array();
        if (is_array($categoryId)) {
            $categoryIds = $categoryId;
        } else {
            if (is_numeric($categoryId)) {
                $categoryIds[] = $categoryId;
            } else {
                if (null === $categoryId) {
                    $categoryIds[] = $this->getContentPurchase()->getFirst()->getCategory()->getId();
                }
            }
        }

        return $purchases = ContentPurchaseTable::getInstance()->getPurchaseContent($categoryIds);
    }

    public function getContentPurchaseForPeriod(Period $period)
    {
        $q = Doctrine_Query::create()
            ->select('cp.*, count(1) as cp_count, sum(t.amount) as cp_amount')
            ->from('ContentPurchase cp')
            ->innerJoin('cp.Transaction t')
            ->where('cp.id_user = ?', $this->getId())
            ->andWhere('t.id_period = ?', $period->getId())
            ->groupBy('cp.id_content');

        return $q->execute();
    }

    public function getSoldForPeriod(Period $period)
    {
        $q = Doctrine_Query::create()
            ->select('cp.*, cc.*, count(1) as cp_count, sum(t.amount) as cp_amount')
            ->from('ContentPurchase cp')
            ->innerJoin('cp.Transaction t')
            ->innerJoin('cp.Content cc')
            ->where('cc.id_user = ?', $this->getId())
            ->andWhere('t.id_period = ?', $period->getId())
            ->groupBy('cp.id_content');

        return $q->execute();
    }

    protected function getUserTypePrefix()
    {
        switch ($this->getUtype()) {
            case 'puser':
                $prefix = 'p';
                break;
            case 'uuser':
                $prefix = 'u';
                break;
            default:
                $prefix = null;
        }
        return $prefix;
    }

    /**
     * Add funds algorithm
     *
     * @param <integer> $amount
     * @return <bool>
     */
    public function addFunds($amount = 0)
    {
        if ($amount == 0) {
            return true;
        }
        // creating new transaction
        $transaction = new Transaction();

        if (null === $this->getUSerTypePrefix()) {
            return false;
        }

        // add funds transaction
        if (!$addTransaction = $transaction->addFunds(
            $this->getUSerTypePrefix(),
            $amount,
            $this->getId(),
            $this->getBalans()
        )
        ) {
            return false;
        } else {
            return $addTransaction;
        }
    }

    public static function addFundsFin(Transaction $transaction)
    {
        if ($transaction->getIsPaid()) {
            // транзакция уже была обработана
            return false;
        } else {
            $transaction->addFundsFin();
        }

        // set new balance
        $user = UserTable::getInstance()->findOneById($transaction->getIdReceiver());

        $user->setBalans($transaction->getReceiverBalanceAfter());
        $user->save();

        $amount = $transaction->getAmount();

        // write to BalanceUser instance
        if (!$userBalance = BalanceUserTable::getByUserIdAndPeriodId($user->getId())) {
            $userBalance = new BalanceUser();
            $userBalance->setPeriod(Period::getCurrentPeriod());
            $userBalance->setUser($user);
        }
        $userBalance->setAddFunds($userBalance->getAddFunds() + $amount);
        $userBalance->save();

        if (!$systemBalance = BalanceSystem::getCurrentBalanceInstance()) {
            sfContext::getInstance()->getLogger()->info('aS4W Error: getCurrentBalanceInstance return false');

            return false;
        }

        if ($user->getUSerTypePrefix() == 'u') {
            $systemBalance->setDepositUser($systemBalance->getDepositUser() + $amount);
        } else {
            switch ($user->getTariff()) {
                case 'standart':
                    $systemBalance->setDepositStandart($systemBalance->getDepositStandart() + $amount);
                    break;
                case 'super':
                    $systemBalance->setDepositSuper($systemBalance->getDepositSuper() + $amount);
                    break;
                case 'expert':
                    $systemBalance->setDepositExpert($systemBalance->getDepositExpert() + $amount);
                    break;
            }
        }
        $systemBalance->save();

        // If user blocked try UnBlock
        if ($user->is_blocked) {
            $user->tryUnBlockUser();
        }

        return true;
    }

    /**
     * Purchase article by user
     *
     * @param int $article_id - Purcased article ID
     * @return bool
     */
    public function purchaseArticle($article_id = 0)
    {
        $res = false;
        $billing = new BillingClass();
        $transaction = $billing->userPurchaseArticle($this, $article_id);
        if ($transaction instanceof Transaction) {
            // Add Article to My purchases list
            $pl = new ContentPurchase();
            $res = $pl->userPurchaseArticle($this->getId(), $article_id, $transaction);
        }

        return $res;
    }


    /**
     * Try un block U_User. If current balance > price 1K * 2
     *
     * @return <bool> - returned TRUE if seccess
     */
    public function tryUnBlockUser()
    {
        $res = false;
        $settings = new Setting();
        if ($this->getUtype() == 'uuser') {
            if ($this->balans >= 2 * $settings->getPrice1k()) {
                $res = true;
            }
        } elseif ($this->getUtype() == 'puser') {
            $min_summ = $settings->getPriceStandart();
            if ($this->getTariff() == 'expert') {
                $min_summ = $settings->getPriceExpert();
            } elseif ($this->getTariff() == 'super') {
                $min_summ = $settings->getPriceSuper();
            }

            if ($this->balans >= $min_summ) {
                $res = true;
            }
        }

        if ($res) {
            $this->setIsBlocked(false);
            $this->save();
        }

        return $res;
    }

    /**
     * Returns BalanceUser.sell_purchase_cnt
     * @return <integer>
     */
    public function getSellPurchaseCnt()
    {
        return BalanceUserTable::getByUserIdAndPeriodId($this->getId())->getSellPurchaseCnt();
    }

    /**
     * Returns BalanceUser.amount
     * @return <integer>
     */
    public function getAmount()
    {
        return BalanceUserTable::getByUserIdAndPeriodId($this->getId())->getAmount();
    }

    /**
     * Returns create date in the Y.m.d format
     * @return <string> create date
     */
    public function getCreated()
    {
        $datetimeArray = explode(' ', $this->getCreatedAt());

        return str_replace('-', '.', $datetimeArray[0]);
    }


    public function  getIsBlockedString()
    {
        return (!$this->getIsBlocked()) ? 'Ok' : 'стоп';
    }

    /**
     *
     * @param <type> $utype
     * @return <type>
     */
    public function getUserAmountSum($utype, $period = 0)
    {
        $q = UserTable::getInstance()->getBalanceUserFieldSum('amount');
        $q->andWhere('u.utype=?', $utype);
        if ($period > 0) {
            $q->andWhere('id_period = ?', $period);
        }
        $resultSet = $q->execute();

        return $resultSet->getFirst()->getAmountSum();
    }

    public function getToPayForPeriod($period_id)
    {
        $q = UserTable::getInstance()
            ->getBalanceUserFieldSum('payable')
            ->andWhere('id_user = ?', $this->getId())
            ->andWhere('id_period != ?', $period_id)
            ->andWhere('was_paid = 0')
            ->execute();

        $res = $q->getFirst()->getPayableSum();

        return $res ? $res : '0.00';
    }

    /**
     *
     * @param <type> $utype
     * @return <type>
     */
    public function getUserSellPurchaseSum($utype, $period = 0)
    {
        $q = UserTable::getInstance()->getBalanceUserFieldSum('sell_purchase_cnt');
        $q->andWhere('u.utype=?', $utype);
        if ($period > 0) {
            $q->andWhere('id_period = ?', $period);
        }
        $resultSet = $q->execute();

        return $resultSet->getFirst()->getSellPurchaseCntSum();
    }

    public function getNotPublishedArticle()
    {
        if ($this->getUtype() != 'puser') {
            return false;
        }
        $list = ContentTable::getInstance()->getNopublishedList($this->getId());
    }


    /**
     * Randomly generated passkey
     *
     * @return <string> passKey
     */
    public function generatePassword()
    {
        $passKey = substr(md5($this->getLogin() . mt_rand(10, 900000)), 0, 10);

        return $passKey;
    }

    /**
     * Return object BalanceUser by period ID. If $period_id return
     * BalanceUser by current period
     *
     * @param int $period_id
     * @return insrance BalanceUser
     */
    public function getUserBalanceByPeriodId($period_id = 0)
    {
        if (is_null($period_id)) {
            $balance = false;
        } else {
            $balance = BalanceUserTable::getByUserIdAndPeriodId($this->getId(), $period_id);
        }

        return $balance;
    }

    public function hasVote()
    {
        return VoteTable::getInstance()->getUserVote($this->getId());
    }

    /**
     * Returns vote id or false on failure
     *
     * @return <mixed> bool|integer
     */
    public function isVoted()
    {
        $vote = VoteTable::getInstance()->getUserVotersVote($this->getId());
        if ($vote) {
            return $vote->getId();
        }

        return false;
    }


    public function hasRateContent($iArticleId)
    {
        $q = Doctrine_Query::create()
            ->select('cr.content_rating')
            ->from('ContentRating cr')
            ->where('cr.content_id=?', $iArticleId)
            ->andWhere('cr.user_id=?', $this->getId())
            ->limit(1);

        if ($oCR = $q->fetchOne()) {
            if ($oCR->getContentRating() >= 1 && $oCR->getContentRating() <= 5) {
                return $oCR;
            }
        }

        return false;
    }

    public function hasRateTranslate($iArticleId)
    {
        $q = Doctrine_Query::create()
            ->select('cr.translate_rating')
            ->from('ContentRating cr')
            ->where('cr.content_id=?', $iArticleId)
            ->andWhere('cr.user_id=?', $this->getId())
            ->limit(1);
        if ($oCR = $q->fetchOne()) {
            if ($oCR->getTranslateRating() >= 1 && $oCR->getTranslateRating() <= 5) {
                return $oCR;
            }
        }

        return false;
    }

    public function generateImg()
    {
        $width = 100;
        $height = 16;

        $mask = imagecreatefrompng(sfConfig::get('sf_upload_dir') . '/assets/mask.png');
        imagealphablending($mask, false);
        imagesavealpha($mask, true);
        $img = imagecreatetruecolor($width, $height);
        imagerectangle(
            $img,
            1,
            1,
            $width - 1,
            99,
            imagecolorallocate($img, rand(10, 255), rand(10, 255), rand(10, 255))
        );

        for ($x = 2; $x < $width - 1; $x++) {
            imageline(
                $img,
                $x,
                2,
                $x,
                $height - 2,
                imagecolorallocate($img, rand(20, 255), rand(0, 255), rand($x, 255))
            );
        }

        imagecopy($mask, $img, 57, 90, 0, 0, 100, 16);

        // Save file
        $this->setImgFileName(md5($this->getId() . 'Ab222+!+R') . '.png');
        $file_full_path = sfConfig::get('sf_upload_dir') . sfConfig::get(
            'app_secret_img_path_dir'
        ) . '/' . $this->getImgFileName();
        imagepng($mask, $file_full_path);
        imagedestroy($img);
        imagedestroy($mask);
        chmod($file_full_path, 0777);

        // Get file info
        $this->setImgFileMd5(md5_file($file_full_path));
        $this->setImgFileSize(filesize($file_full_path));
    }

    public function checkSequereImg($fileName)
    {
        if ($this->getImgFileMd5() != md5_file($fileName)) {
            return false;
        }
        if ($this->getImgFileSize() != filesize($fileName)) {
            return false;
        }

        return true;
    }

    public function delete(Doctrine_Connection $conn = null)
    {
        if ($this->getUtype() == 'puser') {
            $q = Doctrine_Query::create()
                ->select('bu.*, sum(bu.payable) as u_payable')
                ->from('BalanceUser bu')
                ->where('bu.id_user = ?', $this->getId())
                ->andWhere('bu.was_paid = 0')
                ->groupBy('bu.id')
                ->execute();

            if (count($q) > 0 and $q->getFirst()->getUPayable() > 0) {
                return false;
            } else {
                return parent::delete($conn);
            }
        } else {
            return parent::delete($conn);
        }
    }

    public function getSoldStatsForPeriod(Period $period)
    {
        $q = Doctrine_Query::create()
            ->select('u.id, sum(t.amount) as sell_sum, count(t.id) as sell_count, count(c.id) as content_count, sum(c.letters_k) as letter_sum')
            ->from('User u')
            ->leftJoin('u.Content c')
            ->leftJoin('c.ContentPurchase cp')
            ->leftJoin('cp.Transaction t with t.id_period = ?', $period->getId())
            ->where('u.id = ?', $this->getId())
            ->groupBy('u.id')
            ->execute();

        return $q->getFirst();
    }

    public function getSiteUrl()
    {
        $site = $this->getSite();

        if (preg_match('#^http://#', $site)) {
            $out = $site;
        } else {
            $out = 'http://' . $site;
        }

        return $out;
    }
}