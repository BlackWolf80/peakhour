<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'],'notExist'],
            [['username', 'password', 'auth_key'], 'string', 'max' => 255],
            [['name', 'email', 'phone', 'role'], 'string', 'max' => 150],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',

            'password' => 'Пароль',
            'auth_key' => 'Auth Key',
            'username' => 'Логин',
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'role' => 'Привилегии',
        ];
    }
    public function notExist()
    {
        $errorMsg ='Такой логин уже существует.';
        $users = User::findOne(['username' => $this->username]);

        if ($users['username'] ==  $this->username ){ $this->addError( $this->username,$errorMsg);}
    }
}
