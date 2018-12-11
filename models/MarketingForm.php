<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\base\Model;


class MarketingForm extends ActiveRecord
{

    public $verifyCode;

    public static function tableName()
    {
        return 'marketing';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'имя',
            'phone' => 'телефон',
            'email' => 'E-mail',
            'verifyCode' => 'проверочный код',
        ];
    }

    public function rules(){
        return [
            [[ 'name', 'phone', 'email'], 'required'],
            [['id'], 'integer'],
            [['date'], 'safe'],
            [['name','phone','email'], 'string', 'max' => 50],
            [['id'], 'unique'],
            ['verifyCode', 'captcha'],
        ];
    }

}