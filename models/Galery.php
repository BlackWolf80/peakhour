<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "galery".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $publication
 */
class Galery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['publication'], 'integer'],
            [['name', 'image'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'image' => 'Изображение',
            'publication' => 'id публикации',
        ];
    }
    public function getPublications()
    {
        return $this->hasOne(Publications::className(), ['id' => 'publication']);
    }
}