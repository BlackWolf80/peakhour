<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $message
 * @property int $status
 */
class Request extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['status'], 'integer'],
            [['name', 'phone'], 'string', 'max' => 150],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Сообщение',
            'status' => 'Статус',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'verifyCode' => 'проверочный код',
        ];
    }
}
