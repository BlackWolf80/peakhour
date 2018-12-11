<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LegrotipPriceNZSM;

/**
 * LegrotipPriceNZSMSearch represents the model behind the search form of `app\models\LegrotipPriceNZSM`.
 */
class LegrotipPriceNZSMSearch extends LegrotipPriceNZSM
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'tara'], 'safe'],
            [['packing', 'price_sht', 'price_kg'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LegrotipPriceNZSM::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'packing' => $this->packing,
            'price_sht' => $this->price_sht,
            'price_kg' => $this->price_kg,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tara', $this->tara]);

        return $dataProvider;
    }
}
