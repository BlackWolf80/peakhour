<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "query".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $query
 * @property string $date
 * @property int $publicgroup
 *
 * @property Answer[] $answers
 * @property Publicgroup $publicgroup0
 */
class Query extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'query';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'query'], 'required'],
            [['query'], 'string'],
            [['date'], 'safe'],
            [['publicgroup'], 'integer'],
            [['name', 'email'], 'string', 'max' => 150],
            ['verifyCode', 'captcha'],
            [['publicgroup'], 'exist', 'skipOnError' => true, 'targetClass' => Publicgroup::className(), 'targetAttribute' => ['publicgroup' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'E-mail',
            'query' => 'Вопрос',
            'date' => 'Date',
            'publicgroup' => 'Publicgroup',
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


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswer()
    {
        return $this->hasMany(Answer::className(), ['query' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicgroup()
    {
        return $this->hasOne(Publicgroup::className(), ['id' => 'publicgroup']);
    }
}
