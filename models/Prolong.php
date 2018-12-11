<?php

namespace app\models;

use Yii;

class Prolong extends \yii\db\ActiveRecord
{
    public $id;
    public $period;


    public function attributeLabels()
    {
        return [
            'id' => 'Номер заказа',
            'period' => 'Период',

        ];
    }

}
