<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publicgroup".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $status
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
            [['name', 'description', 'keywords'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 1],
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
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'status' => 'Status',
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

    public function getCorr()
    {
        return $this->hasMany(Corr::className(), ['group' => 'id']);
    }

    public function getQuery()
    {
        return $this->hasMany(Query::className(), ['publicgroup' => 'id']);
    }
}
