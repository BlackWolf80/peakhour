<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagerand".
 *
 * @property int $id
 * @property string $image
 * @property int $group
 */
class Imagerand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagerand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group'], 'integer'],
            [['image'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'group' => 'Group',
        ];
    }
}
