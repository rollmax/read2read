<?php
/**
 * Ежедневные задания. Запускается в 0.01
 *
 */

class DailyTask extends sfBaseTask
{

    protected function configure()
    {
        $this->addOptions(
            array(
                new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'backend'),
                new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
                new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
            )
        );

        $this->namespace = 'read2read';
        $this->name = 'daily-tasks';
        $this->briefDescription = 'Execute daily tasks';
        $this->detailedDescription = <<<EOF
The [daily-tasks|INFO] Ежедневные задачи.
Call it with:

  [php symfony read2read:daily-tasks|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array())
    {
        $configuration = ProjectConfiguration::getApplicationConfiguration(
            $options['application'],
            $options['env'],
            true
        );
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase(
            $options['connection'] ? $options['connection'] : null
        )->getConnection();

        $oBilling = new BillingClass();
        $oBilling->puserDailyPayment();

        $q = Doctrine_Query::create()
            ->from('BalanceUser bu')
            ->innerJoin('bu.User u')
            ->where('bu.payable > 0')
            ->andWhere('bu.was_paid = 0')
            ->andWhere('u.active = 1')
            ->andWhere('u.utype = "puser"')
            ->groupBy('bu.id_user')
            ->execute();

        $frontendRouting = new sfPatternRouting(new sfEventDispatcher());

        $config = new sfRoutingConfigHandler();
        $routes = $config->evaluate(array(sfConfig::get('sf_apps_dir').'/frontend/config/routing.yml'));


        $frontendRouting->setRoutes($routes);


        foreach ($q as $rec) {
            if (!preg_match('/^R[0-9]{12}$/', $rec->getUser()->getAccountNumber())) {
                $email = $rec->getUser()->getEmail();
                $url = 'http://read2read.ru' . $frontendRouting->generate('profile_p_invoice', array(), true);
                $message = $this->getMailer()->compose(
                    sfConfig::get('app_r2r_noreply_email'),
                    $email,
                    'Read2Read - Напоминание о заполнении номера кошелька',
                    <<<EOF
Вы зарегистрировались на сайте Read2Read.ru и на вашем счету имеется сумма положенная
к выплате в следующем платежном периоде. Для получения этих средств перейдите на сайт
Read2Read.ru и заполните номер кошелька. Ссылка для перехода: {$url}
EOF
                );
                $this->getMailer()->send($message);
            }

        }
    }

}
