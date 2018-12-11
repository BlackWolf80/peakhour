<?php

namespace app\modules\adm\models;

use Yii;

/**
 * This is the model class for table "publicgroup".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $title
 * @property int $status
 * @property int $block
 * @property string $address
 * @property string $description
 * @property string $keywords
 *
 * @property Publications[] $publications
 */
class Publicgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publicgroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'parent_id'], 'integer'],
            [['name', 'title', 'description', 'keywords'], 'string', 'max' => 255],
            [['status', 'block'], 'string', 'max' => 1],
            [['address'], 'string', 'max' => 250],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская группа',
            'name' => 'Имя',
            'title' => 'Title',
            'status' => 'Статус',
            'block' => 'Блокировка',
            'address' => 'Ссылка',
            'description' => 'Description',
            'keywords' => 'Keywords',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublications()
    {
        return $this->hasMany(Publications::className(), ['group' => 'id']);
    }
}
