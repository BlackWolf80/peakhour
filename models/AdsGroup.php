<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ads_group".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property int $status
 * @property string $description
 * @property string $keywords
 *
 * @property Ads[] $ads
 */
class AdsGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ads_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description', 'keywords'], 'string', 'max' => 150],
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
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'description' => 'Description',
            'keywords' => 'Keywords',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasMany(Ads::className(), ['group' => 'id']);
    }
}
