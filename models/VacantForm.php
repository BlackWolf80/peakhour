<?php

namespace app\models;
use yii\db\ActiveRecord;

class VacantForm extends ActiveRecord
{
    public $verifyCode;

    public static function tableName()
    {
        return 'vacantion';
    }

    public function attributeLabels(){
        return [
            'name' => 'Ваше Имя',
            'phone' => 'Телефон',
            'verifyCode' => 'Проверочный код',

        ];
    }

    public function rules(){
        return [
            [['vac_name','phone'], 'required' ],
            ['verifyCode', 'captcha'],
        ];
    }

}