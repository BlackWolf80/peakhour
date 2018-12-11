<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_ADMIN = 'root';
    const ROLE_USER = 'users';
    const ROLE_CORR = 'corr';

    public $verifyCode;

    public static function tableName(){
        return 'user';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'role' => 'Привилегии',
            'verifyCode' => 'Проверочный код'

        ];
    }

    public function rules(){
        return [
            [[ 'username', 'name', 'email', 'phone'], 'required'],
            [['username'],'notExist'],
            [['name', 'email', 'phone'], 'string', 'max' => 150],
            [['username'], 'string', 'max' => 255],
            [['email'], 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
//        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function notExist()
    {
        $errorMsg ='Такой логин уже существует.';
        $users = User::findOne(['username' => $this->username]);

        if ($users['username'] ==  $this->username ){ $this->addError( $this->username,$errorMsg);}
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }




    public function validatePhoneEmailEmpty()
    {
        if(empty($this->phone) && empty($this->email))
        {
            $errorMsg= 'Укажите ваш email или телефон';
            $this->addError('phone',$errorMsg);
            $this->addError('email',$errorMsg);
        }
        if(!empty($this->phone) && (strlen($this->phone)<7))
        {
            $errorMsg= 'Слишком мало цифр в номере телефона';
            $this->addError('phone',$errorMsg);
        }
    }



    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }


    public function can($role) {
        return $this->role == $role;
    }


    public function getCorr()
    {
        return $this->hasMany(User::className(), ['user' => 'id']);
    }


}
