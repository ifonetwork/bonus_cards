<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cards;

/**
 * CardsSearch represents the model behind the search form about `app\models\Cards`.
 */
class CardsSearch extends Cards
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number', 'used', 'active','bonus'], 'integer'],
            [['series', 'time_generated', 'time_used', 'expiration_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Cards::find();

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
            'number' => $this->number,
            'time_generated' => $this->time_generated,
            'time_used' => $this->time_used,
            'used' => $this->used,
            'active' => $this->active,
            'expiration_date' => $this->expiration_date,
			'bonus' => $this->bonus,
			 
        ]);

        $query->andFilterWhere(['like', 'series', $this->series]);

        return $dataProvider;
    }
}
