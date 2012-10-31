<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerUserUForm
 *
 * @author kalupathor
 */
class RegisterUserPForm extends UserForm
{
    public function configure()
    {
        // using just login and email
        $this->useFields(array('login', 'email', 'tariff'));

        // add email validation to email field
        $this->validatorSchema['email'] = new sfValidatorAnd(array(
            $this->validatorSchema['email'],
            new sfValidatorEmail(array(), array(
                'required' => 'Введите адрес электронной почты',
                'invalid' => 'Не верен формат адреса почты'
            )),
            new sfValidatorDoctrineUnique(
                array('model' => 'User', 'column' => 'email'),
                array('invalid' => 'Пользователь с таким e-mail уже существует')
            ),
        ));

        $this->validatorSchema['login']->setMessage('required', 'Введите логин.');

        $this->validatorSchema['login'] = new sfValidatorAnd(array(
            $this->validatorSchema['login'],
            new sfValidatorDoctrineUnique(
                array('model' => 'User', 'column' => 'login'),
                array('invalid' => 'Такой пользователь уже существует.')
            ),
        ));

        $this->widgetSchema['tariff'] = new sfWidgetFormSelectRadio(array('choices' => User::$tariffs));
        $this->validatorSchema['tariff']->setOption('required', 'true');
        $this->validatorSchema['tariff']->setMessage('required', 'Выберите тарифный план');


        $this->widgetSchema->setLabels(array('email' => 'E-mail', 'login' => 'Логин', 'tariff' => 'Тарифный план'));
    }

    public function bind(array $v = null, array $f = null)
    {
        $q = Doctrine_Query::create()
            ->select('u.*')
            ->from('User u')
            ->where('(u.login = ? or u.email = ?) and u.password IS NULL and u.active=0', array($v['login'], $v['email']));

        if ($q->count() > 0) {
            foreach ($q->execute() as $rec) {
                $rec->delete();
            }
        }

        parent::bind($v, $f);
    }


    public function processValues($values)
    {
        $values['utype'] = 'puser'; // Тип u_пользователь

        return parent::processValues($values);
    }

}
