<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Feedback extends ActiveRecord
{
    public $verifyCode;

    public static function tableName()
    {
        return 'feedback';
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Автор',
            'email' => 'E-mail',
            'message' => 'Сообщение',
            'status' => 'Status',
            'verifyCode' => 'проверочный код',
        ];
    }

    public function rules()
    {
        return [
            [['author', 'email', 'message'], 'required'],
            [['message'], 'string'],
            [['status'], 'integer'],
            [['author'], 'string', 'max' => 150],
            [['email'], 'string', 'max' => 250],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }


    public function feedback($email)
    {

        if ($this->validate()) {


            $body= 'Сообщение от '.$this->author.'-----'.$this->email.'-----'.$this->message;


            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$email=>'Сервис обратной связи'])
                ->setSubject('Сообщение от '.$this->author)
                ->setTextBody($body)
                ->send();

            return true;
        }
        return false;
    }

}
