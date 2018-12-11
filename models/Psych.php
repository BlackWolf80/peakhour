<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;


class Psych extends ActiveRecord
{
    public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'query';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'E-mail',
            'query' => 'Вопрос',
            'publicgroup' => ' ',
            'verifyCode'=>'Проверочный код'
        ];
    }

    public function rules()
    {
        return [
            [['name', 'email', 'query'], 'required'],
            [['query'], 'string'],
            [['date'], 'safe'],
            [['publicgroup'], 'integer'],
            [['name', 'email'], 'string', 'max' => 150],
            ['verifyCode', 'captcha'],
       ];
    }



    public function psychmail($email)
    {

        if ($this->validate()) {
            $body= 'Сообщение от '.$this->name.'-----'.$this->email.'-----'.$this->query;
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$email=>'Сервис обратной связи'])
                ->setSubject('Сообщение от '.$this->name.' для психолога')
                ->setTextBody($body)
                ->send();
            return true;
        }
        return false;
    }


}
