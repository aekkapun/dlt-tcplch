<?php

namespace backend\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\configuration\models\Customs;

/**
 * CustomsSearch represents the model behind the search form about `backend\modules\configuration\models\Customs`.
 */
class CustomsSearch extends Customs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customs_office_id'], 'integer'],
            [['customs_name', 'customs_prv', 'customs_amp', 'customs_zipcode', 'customs_tel'], 'safe'],
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
        $query = Customs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'customs_office_id' => $this->customs_office_id,
        ]);

        $query->andFilterWhere(['like', 'customs_name', $this->customs_name])
            ->andFilterWhere(['like', 'customs_prv', $this->customs_prv])
            ->andFilterWhere(['like', 'customs_amp', $this->customs_amp])
            ->andFilterWhere(['like', 'customs_zipcode', $this->customs_zipcode])
            ->andFilterWhere(['like', 'customs_tel', $this->customs_tel]);

        return $dataProvider;
    }
}
