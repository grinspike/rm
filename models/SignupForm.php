<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignupForm extends Model
{

    public $login;
    public $password;
    public $passwordMaster;
    public $email;
    public $rememberMe = true;
    public $captcha;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
                [['login', 'password', 'passwordMaster', 'email','captcha'], 'required'],
                [['login'], 'string', 'min'=> 1],
                ['email', 'email'],
                ['captcha', 'captcha'],
                ['login', 'unique', 'targetClass' => 'app\models\Clan'],
                ['email', 'unique', 'targetClass' => 'app\models\Clan'],
                ['password', 'string', 'min' => 2],
                ['passwordMaster', 'string', 'min' => 2],
                ['rememberMe', 'boolean'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
//    public function validatePassword($attribute, $params)
//    {
//        if (!$this->hasErrors()) {
//            $user = $this->getUser();
//
//            if (!$user || !$user->validatePassword($this->password)) {
//                $this->addError($attribute, 'Incorrect username or password.');
//            }
//        }
//    }

    /**
     * Signups a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */


    public function signup()
    {
        if ($this->validate()) {
            $clan = new Clan;
            $clan->login = $this->login;
            $clan->password_master_hash = Yii::$app->getSecurity()->generatePasswordHash($this->passwordMaster);
            $clan->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            $clan->email = $this->email;
            $clan->auth_key = Yii::$app->getSecurity()->generateRandomString(50);
            return $clan->save();
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Clan::findByUsername($this->clanname);
        }

        return $this->_user;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Название клана',
            'password' => 'Пароль для доступа к карте',
            'passwordMaster' => 'Пароль для управления кланом',
            'email' => 'Электронная почта',
            'rememberMe' => 'Запомнить ',
        ];
    }

}
