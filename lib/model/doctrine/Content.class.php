<?php

/**
 * Content
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    read2read
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Content extends BaseContent
{

    /**
     * Delete content
     *
     * @return boolean - true if successful
     */
    public function deleteContent()
    {
        if ($this->getState() == 'draft') {
            $this->setState('deleted');
            $this->setToDelete(true);
            $this->save();
            return true;
        } elseif ($this->getState() == 'public') {
            /*
            if ($this->getToDelete()) {
                $this->setState('deleted');
            } else {
                $this->setToDelete(true);
            }
            */
            $this->setState('draft');
            $this->save();

            return true;
        }

        return false;
    }

    /**
     * Return Created date in format: YYYY-MM-DD
     *
     * @return string - created date string
     */
    public function getCreatedDate()
    {
        $tmp = explode(' ', $this->getCreatedAt());

        return (isset($tmp[0]) ? $tmp[0] : '');
    }

    public function getPathPhotoRu()
    {
        return ($this->getPhotoRu() !== null) ? sfConfig::get('app_articles_photo_dir') . '/ru/' . $this->getPhotoRu(
        ) : false;
    }

    public function getPathPhotoEn()
    {
        return ($this->getPhotoEn() !== null) ? sfConfig::get('app_articles_photo_dir') . '/en/' . $this->getPhotoEn(
        ) : false;
    }

    /**
     * Return price for this content
     *
     * @return decimal
     */
    public function getPrice()
    {
        $settings = SettingTable::getInstance()->getSettings();

        return (round(($this->getLettersK() / 10) * $settings->getPrice_1k())) / 100;
    }

    public function getTranslator()
    {
        if (!$this->getIdUser()) {
            return false;
        }

        return Doctrine_Core::getTable('User')->find($this->getIdUser());
    }

    public function getPUserTariff()
    {
        $p_user = $this->getTranslator();

        return $p_user->getTariff();
    }

    /**
     * Published this Content (Article)
     *
     * @throws Exception                    if record is not valid and validation is active
     * @return void
     */
    public function publish()
    {
        $date = $this->getPubDate();
        if ($date == '0000-00-00') {
            $this->setPubDate(date('Y-m-d'));
        }
        if ($this->getCategory()->getIsFree()) {
            $this->setIsFree(true);
        }
        $this->setToDelete(false);
        $this->setState('public');
        $this->save();
        $this->refreshLettersCount();
    }

    /**
     * Updates count of the letters for the article
     *
     */
    public function refreshLettersCount()
    {
        $fullText = '';
        foreach ($this->getParagraph() as $paragraph) {
            $fullText .= $paragraph->getParagraphRu();
        }

        $fullText = $this->mb_str_replace(' ', '', $fullText);
        $count = mb_strlen($fullText, 'UTF-8');
        $this->setLettersK($count);
        $this->save();

        return (bool)$this->getId();
    }

    /**
     * byte str_replace
     * @param <string> $needle
     * @param <string> $replacement
     * @param <string> $haystack
     * @return <string>
     */
    protected function mb_str_replace($needle, $replacement, $haystack)
    {
        $res = mb_split($needle, $haystack);

        return implode($replacement, $res);
    }

    public function  getContentRate()
    {
        $oRatings = $this->getContentRating();
        $iCounter = 1;
        $iSum = 0;

        foreach ($oRatings as $oRating) {
            $iSum += $oRating->getContentRate();
            $iCounter++;
        }

        return $iSum / $iCounter;
    }

    public function getTranslateRate()
    {
        $oRatings = $this->getContentRating();
        $iCounter = 1;
        $iSum = 0;

        foreach ($oRatings as $oRating) {
            $iSum += $oRating->getTranslateRate();
            $iCounter++;
        }

        return $iSum / $iCounter;
    }

    public function setUserTranslateRating($iUserId, $iTranslateRate)
    {
        $oPeriod = Period::getCurrentPeriod();

        $oUser = UserTable::getInstance()->findOneById($iUserId);

        if (!$oContentRating = $oUser->hasRateContent($this->getId())) {
            $oContentRating = new ContentRating();
            $oContentRating->setContentId($this->getId());
            $oContentRating->setPeriodId($oPeriod->getId());
            $oContentRating->setUserId($iUserId);
        }

        $oContentRating->setTranslateRating($iTranslateRate);
        $oContentRating->save();

        $aArticles = ContentRatingTable::getInstance()->getRatesByArticle($this->getId(), $oPeriod->getId());

        $iSum = 0;

        foreach ($aArticles as $oRating) {
            $iSum += $oRating->getTranslateRating();
        }

        $this->setTransRate($iSum / $aArticles->count());
        $this->save();
    }

    public function setUserContentRating($iUserId, $iTranslateRate)
    {
        $oPeriod = Period::getCurrentPeriod();

        $oUser = UserTable::getInstance()->findOneById($iUserId);

        if (!$oContentRating = $oUser->hasRateTranslate($this->getId())) {
            $oContentRating = new ContentRating();
            $oContentRating->setContentId($this->getId());
            $oContentRating->setPeriodId($oPeriod->getId());
            $oContentRating->setUserId($iUserId);
        }

        $oContentRating->setContentRating($iTranslateRate);
        $oContentRating->save();

        $aArticles = ContentRatingTable::getInstance()->getRatesByArticle($this->getId(), $oPeriod->getId());

        $iSum = 0;

        foreach ($aArticles as $oRating) {
            $iSum += $oRating->getContentRating();
        }

        $this->setContRate($iSum / $aArticles->count());
        $this->save();
    }

    public function getTitleStyle($header = false)
    {
        $out = array();
        if ($this->getIsBold()) {
            $out[] = "bold";
        }
        if ($this->getIsItalic()) {
            $out[] =  "ita";
        }
        if ($this->getHStyle() != 'none') {
            $out[] = "h_" . $this->getHStyle();
        } else {
            $out[] = ($header) ? '' : 'h';
        }

        return join(' ', $out);
    }
}
