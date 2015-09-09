<?php

namespace backend\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\configuration\models\BorderCheckpoint;

/**
 * BorderCheckpointSearch represents the model behind the search form about `backend\modules\configuration\models\BorderCheckpoint`.
 */
class BorderCheckpointSearch extends BorderCheckpoint
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'border_province'], 'integer'],
            [['border_thai', 'border_other', 'border_land'], 'safe'],
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
        $query = BorderCheckpoint::find();

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
            'border_province' => $this->border_province,
        ]);

        $query->andFilterWhere(['like', 'border_thai', $this->border_thai])
            ->andFilterWhere(['like', 'border_other', $this->border_other])
            ->andFilterWhere(['like', 'border_land', $this->border_land]);

        return $dataProvider;
    }
}
