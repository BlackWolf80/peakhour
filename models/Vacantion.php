<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacantion".
 *
 * @property int $id
 * @property string $vac_name
 * @property string $organization
 * @property string $description
 * @property string $contact_name
 * @property string $phone
 * @property string $email
 * @property int $group_id
 * @property string $address
 * @property int $price
 * @property string $date
 * @property int $premium
 * @property int $status
 *
 * @property VacantionGroup $group
 */
class Vacantion extends \yii\db\ActiveRecord
{
    public $verifyCode;
    public $image;
    public $specification;
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'vacantion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vac_name', 'email'], 'required'],
            [['description'], 'string'],
            [['group_id', 'price', 'premium', 'status'], 'integer'],
            [['date'], 'safe'],
            [['vac_name', 'organization'], 'string', 'max' => 250],
            [['contact_name', 'phone', 'email'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 500],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => VacantionGroup::className(), 'targetAttribute' => ['group_id' => 'id']],
             ['verifyCode', 'captcha'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            ['specification', 'compare', 'compareValue' => 1, 'message' => 'Чтобы отправить данные нужно согласиться с правилами!'],
            ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'id' => 'ID',
            'vac_name' => 'Вакансия',
            'organization' => 'Организация',
            'description' => 'Описание',
            'contact_name' => 'Контактное лицо',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'group_id' => 'Группа',
            'address' => 'Адрес',
            'price' => 'Зарплата',
            'date' => 'Дата',
            'premium' => 'Премиум',
            'status' => 'Status',
            'image'=> 'Картинка',
            'verifyCode'=>'Код подтверждения',
            'specification' => ' ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(VacantionGroup::className(), ['id' => 'group_id']);
    }
}
