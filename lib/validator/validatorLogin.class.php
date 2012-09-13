<?php

class validatorLogin extends sfValidatorBase
{
    public function configure($options = array(), $messages = array())
    {
        $this->setMessage('invalid', 'Такой логин не существует');
        $this->addMessage('invalid_psw', 'Пароль введен неверно');
    }

    protected function doClean($values)
    {
        $login = $values['login'];
        $password = $values['password'];

        // Exit
        if ($login === NULL || $password === NULL) return $values;

        if ($login and $user = Doctrine::getTable('User')->findOneByLogin($login)) {
            $attempts_count = sfContext::getInstance()->getUser()->getAttribute('attempts_count_for_' . $user->getId(), 0);
            // Пароль подходит?
            $attempts_count++;
            sfContext::getInstance()->getUser()->setAttribute('attempts_count_for_' . $user->getId(), $attempts_count);
            if (!$user->getActive()) {
                throw new sfValidatorErrorSchema($this, array('login' => new sfValidatorError($this, 'unactive')));
            }
            if (!$user->checkPassword($password)) {
                if($attempts_count <= sfConfig::get('app_attempts_count')) {
                    sfContext::getInstance()->getUser()->setFlash('notice',
                    sprintf('Осталось попыток: %s', sfConfig::get('app_attempts_count') - $attempts_count));
                } else {
                    sfContext::getInstance()->getUser()->setFlash('error',
                        'Ваш аккаунт был заблокирован из-за попытки подбора пароля!');
                    $user->setActive(0);
                    sfContext::getInstance()->getUser()->setAttribute('attempts_count_for_' . $user->getId(), 0);
                    $user->save();
                    sfContext::getInstance()->getController()->redirect('profileu_blocked');
                }
                throw new sfValidatorErrorSchema($this, array(
                    'password' => new sfValidatorError($this, 'invalid_psw')
                ));
            } else {
                sfContext::getInstance()->getUser()->setAttribute('attempts_count_for_' . $user->getId(), 0);
            }

            sfContext::getInstance()->getUser()->setAttribute('attempts_count_for_' . $user->getId(), 0);

            return array_merge($values, array('user' => $user));
        }

        throw new sfValidatorErrorSchema($this, array('login' => new sfValidatorError($this, 'invalid')));
    }

}
