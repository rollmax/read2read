<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aleksxor
 * Date: 04.09.12
 * Time: 21:13
 */


class securityLogger
{

    private static $admins = null;
    private $user = null;
    private $context = null;

    public function __construct($context, $user=null)
    {
        if(is_null(self::$admins))
        {
            $tmp = Doctrine_Query::create()
                ->select('User.email')
                ->from('User')
                ->innerJoin('User.groups')
                ->where('group_id = 1')
                ->execute(array(), Doctrine::HYDRATE_NONE);
            foreach($tmp as $item)
            {
                self::$admins[] = $item[0];
            }
        }
        if(!is_null($user))
        {
            $this->user = $user;
        }
        $this->context = $context;
    }

    public function logEvent($txt_subject, $txt_message)
    {
        $senders = self::$admins;
        if (!is_null($this->user))
        {
            $senders[] = $this->user->getEmail();
        }

        $message = $this->context->getMailer()->compose(
            sfConfig::get('app_r2r_noreply_email'),
            $senders,
            $txt_subject,
            $txt_message
        );
        $this->context->getMailer()->send($message);

    }

}
