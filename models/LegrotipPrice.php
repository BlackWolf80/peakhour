<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "legrotip_price".
 *
 * @property int $id
 * @property string $name
 * @property string $tara
 * @property double $packing
 * @property double $price_sht
 * @property double $price_kg
 */
class LegrotipPrice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'legrotip_price';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['density', 'price_t', 'price_l'], 'number'],
            [['name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование продукции',
            'density' => 'Плотность',
            'price_t' => 'Цена (руб./т.)',
            'price_l' => 'Цена (руб./л.) ',
        ];
    }
}
