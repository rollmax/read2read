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
    }

}
