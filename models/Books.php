<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $description
 * @property string $file
 * @property string $audio
 * @property int $author
 * @property int $section
 *
 * @property Authors $author0
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['author', 'section'], 'integer'],
            [['name', 'img'], 'string', 'max' => 250],
            [['file', 'audio'], 'string', 'max' => 150],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['author' => 'id']],
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
            'img' => 'Изображение',
            'description' => 'Описание',
            'file' => 'fb2',
            'audio' =>'Аудио',
            'author' => 'Автор',
            'section' => 'Раздел',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author']);
    }
    public function getSection0()
    {
        return $this->hasOne(Publicgroup::className(), ['id' => 'section']);
    }
}
