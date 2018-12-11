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
class LegrotipPriceNZSM extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'legrotip_priceNZSM';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['packing', 'price_sht', 'price_kg'], 'number'],
            [['name'], 'string', 'max' => 250],
            [['tara'], 'string', 'max' => 150],
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
            'tara' => 'Тара',
            'packing' => 'Фасовка, кг',
            'price_sht' => 'Цена (руб./шт.)',
            'price_kg' => 'Цена (руб./кг.) ',
        ];
    }
}
