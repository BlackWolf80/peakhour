<?php

namespace app\models;

use Yii;

class Adsview extends \yii\db\ActiveRecord
{

    public $verifyCode;
    public $gallery;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'group', 'type', 'status', 'pay', 'premium'], 'integer'],
            [['title', 'body', 'group', 'type'], 'required'],
            [['body'], 'string'],
            [['date'], 'safe'],
            [['title', 'contact_name', 'phone', 'email'], 'string', 'max' => 50],
            [['organization', 'address'], 'string', 'max' => 150],
            [['group'], 'exist', 'skipOnError' => true, 'targetClass' => AdsGroup::className(), 'targetAttribute' => ['group' => 'id']],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
//            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Цена',
            'title' => 'Заголовок',
            'body' => 'Описание',
            'date' => 'Date',
            'group' => 'Категория',
            'type' => 'Срок публикации',
            'gallery' => 'Изображения',
            'status' => 'Status',
            'pay' => 'Pay',
            'organization' => 'Организация',
            'contact_name' => 'Контактное лицо',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'address' => 'Адрес',
            'premium' => 'Премиум',
            'verifyCode' => 'Код подтверждения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(AdsGroup::className(), ['id' => 'group']);
    }

    public function getImages()
    {
        return $this->hasMany(Image::className(), ['itemId' => 'id']);
    }



}
