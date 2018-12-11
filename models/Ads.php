<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ads".
 *
 * @property int $id
 * @property int $price
 * @property string $title
 * @property string $body
 * @property string $date
 * @property int $group
 * @property int $type
 * @property int $status
 * @property int $pay
 * @property int $premium
 * @property string $organization
 * @property string $contact_name
 * @property string $phone
 * @property string $email
 * @property string $address
 *
 * @property AdsGroup $group0
 */
class Ads extends \yii\db\ActiveRecord
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
            'price' => 'Цена',
            'title' => 'Заголовок',
            'body' => 'Описание',
            'date' => 'Дата',
            'group' => 'Категория',
            'type' => 'Срок публикации',
            'gallery' => 'Изображения',
            'organization' => 'Организация',
            'contact_name' => 'Контактное лицо',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'address' => 'Адрес',
            'premium' => 'Премиум',
            'verifyCode' => 'Код подтверждения',
            'status' => 'Статус',
            'pay' => 'Оплата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup0()
    {
        return $this->hasOne(AdsGroup::className(), ['id' => 'group']);
    }


    public function uploadGallery(){
        if($this->validate()){
            foreach($this->gallery as $file){
                $path = 'images/upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }

}
