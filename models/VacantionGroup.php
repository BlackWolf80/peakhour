<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacantion_group".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property string $address
 * @property int $status
 *
 * @property Vacantion[] $vacantions
 */
class VacantionGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacantion_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'status'], 'integer'],
            [['name', 'address'], 'string', 'max' => 150],
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
            'address' => 'Address',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacantions()
    {
        return $this->hasMany(Vacantion::className(), ['group_id' => 'id']);
    }
}
