<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "corr".
 *
 * @property int $id
 * @property int $user
 * @property int $group
 *
 * @property Publicgroup $group0
 */
class Corr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'corr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'group'], 'required'],
            [['user', 'group'], 'integer'],
            [['group'], 'exist', 'skipOnError' => true, 'targetClass' => Publicgroup::className(), 'targetAttribute' => ['group' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'group' => 'Group',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup0()
    {
        return $this->hasOne(Publicgroup::className(), ['id' => 'group']);
    }

    public function getUsers()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }
}
