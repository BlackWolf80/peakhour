<?php

namespace app\modules\adm\models;

use Yii;

/**
 * This is the model class for table "publications".
 *
 * @property int $id
 * @property string $title
 * @property string $date
 * @property string $spoiler
 * @property string $body
 * @property string $author
 * @property string $image
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
            [['spoiler', 'body'], 'string'],
            [['group'], 'integer'],
            [['title', 'image'], 'string', 'max' => 250],
            [['author'], 'string', 'max' => 150],
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
            'title' => 'Заголовок',
            'date' => 'Дата',
            'spoiler' => 'Представление',
            'body' => 'Текст',
            'author' => 'Автор',
            'image' => 'Картинка в заголовке',
            'status' => 'Статус',
            'group' => 'Группа',
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
        return $this->hasMany(Comments::className(), ['id' => 'publication']);
    }

}
