<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\base\Model;


class CommentForm extends ActiveRecord
{

    public $verifyCode;

    public static function tableName()
    {
        return 'comments';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'автор',
            'text' => 'отзыв',
            'publication' => '',
            'date' => 'дата',
            'verifyCode' => 'проверочный код',
        ];
    }

    public function rules(){
        return [
            [[ 'author', 'text', 'publication'], 'required'],
            [['id', 'publication'], 'integer'],
            [['date'], 'safe'],
            [['author'], 'string', 'max' => 150],
            [['text'], 'string', 'max' => 500],
            [['id'], 'unique'],
            ['verifyCode', 'captcha'],
        ];
    }

}