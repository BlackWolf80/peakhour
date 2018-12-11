<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "online".
 *
 * @property int $id
 * @property string $name
 * @property string $src
 * @property string $description
 * @property string $image
 * @property int $group
 * @property int $status
 */
class Online extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'online';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'src'], 'required'],
            [['description'], 'string'],
            [['group', 'status'], 'integer'],
            [['name', 'image'], 'string', 'max' => 150],
            [['src'], 'string', 'max' => 250],
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
            'src' => 'Src',
            'description' => 'Description',
            'image' => 'Image',
            'group' => 'Group',
            'status' => 'Status',
        ];
    }
}
