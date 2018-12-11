<?php

namespace app\models;

use Yii;



class Banners extends \yii\db\ActiveRecord
{

    public $image;
    public $spec;

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
        return 'banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link', 'email', 'contact_name','phone' ], 'required'],
            [['date'], 'safe'],
            [['status', 'pay', 'group', 'period'], 'integer'],
            [['name', 'email', 'phone', 'contact_name', 'organization'], 'string', 'max' => 50],
            [['link'], 'string', 'max' => 250],
            [['image'], 'file',  'extensions' => 'png, jpg, gif'],
            ['spec', 'compare', 'compareValue' => 1, 'message' => 'Чтобы отправить данные нужно принять условия!'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'link' => 'Ссылка',
            'date' => 'Дата',
            'status' => 'Статус',
            'image' => 'Изображение',
            'pay' => 'Оплата',
            'group' => 'Group',
            'email' => 'E-mail' ,
            'contact_name' => 'Контактное лицо',
            'phone' => 'Телефон',
            'organization' => 'Организация',
            'period' => 'Срок публикации',
            'spec' => ' ',
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            $path = 'images/upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            //$path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }

}
