<?php
class BillingClass
{

    /**
     * User purchase article:
     *  - create all necessary transactions
     *
     * @param <User> $user - User object
     * @param <int> $article_id - Article ID
     * @return <bool>
     */
    public function userPurchaseArticle(User $user, $article_id)
    {
        $transaction = new Transaction();

        return $transaction->purchaseContent($user, $article_id);
    }

    public function puserDailyPayment()
    {
        $aTariffs = SettingTable::getAllTariffs();
        $oBalanceSystem = BalanceSystem::getCurrentBalanceInstance();
        $aPUsers = UserTable::getPUsersActive();
        foreach ($aPUsers as $oPUser) {
            $transaction = new Transaction();
            $transaction->puserDailyPayment($oPUser, $oBalanceSystem, $aTariffs);
        }
    }

}