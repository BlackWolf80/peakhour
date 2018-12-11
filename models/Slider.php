<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $column_1
 * @property string $image
 * @property string $title
 * @property string $text
 * @property string $buttons
 * @property int $select
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['select'], 'integer'],
            [['image'], 'string', 'max' => 150],
            [['title'], 'string', 'max' => 250],
            [['text', 'buttons'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'column_1' => 'Column 1',
            'image' => 'Image',
            'title' => 'Title',
            'text' => 'Text',
            'buttons' => 'Buttons',
            'select' => 'Select',
        ];
    }
}
