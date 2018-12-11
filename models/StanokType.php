<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stanok_type".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $description
 */
class StanokType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stanok_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name', 'img'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
            'description' => 'Description',
        ];
    }
}
