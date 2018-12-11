<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publications".
 *
 * @property int $id
 * @property string $title
 * @property string $date
 * @property string $spoiler
 * @property string $body
 * @property int $status
 * @property int $group
 *
 * @property Publicgroup $group0
 */
class Publications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'spoiler'], 'required'],
            [['date'], 'safe'],
            [['group'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 1],
            [['group'], 'exist', 'skipOnError' => true, 'targetClass' => Publicgroup::className(), 'targetAttribute' => ['group' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Загловок',
            'date' => 'Дата',
            'spoiler' => 'Текст предпросмотра',
            'body' => 'Статья',
            'body2' => 'Статья дополнение',
            'status' => 'Статус',
            'group' => 'Группа',
            'image' => 'Изображение в заголовке',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup0()
    {
        return $this->hasOne(Publicgroup::className(), ['id' => 'group']);
    }

    public function getGalery()
    {
        return $this->hasMany(Galery::className(), ['id' => 'publication']);
    }
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['publication' => 'id']);
    }
}
