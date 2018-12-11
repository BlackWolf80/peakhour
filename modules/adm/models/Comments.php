<?php

namespace app\modules\adm\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $author
 * @property string $text
 * @property int $publication
 * @property string $date
 */
class Comments extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'author', 'text', 'publication'], 'required'],
            [['id', 'publication'], 'integer'],
            [['date'], 'safe'],
            [['author'], 'string', 'max' => 150],
            [['text'], 'string', 'max' => 500],
            [['status'], 'string', 'max' => 1],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'автор',
            'text' => 'отзыв',
            'publication' => 'публикация',
            'date' => 'дата',
        ];
    }

    public function getPublications()
    {
        return $this->hasOne(Publications::className(), ['id' => 'publication']);
    }

}
