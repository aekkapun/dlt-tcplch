<?php

namespace backend\modules\permitapp\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\permitapp\models\Drivers;

/**
 * DriversSearch represents the model behind the search form about `backend\modules\permitapp\models\Drivers`.
 */
class DriversSearch extends Drivers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'drivers_title', 'appilcant_id', 'docs', 'status', 'blacklist_status', 'create_at', 'create_by', 'update_at', 'update_by'], 'integer'],
            [['drivers_name', 'drivers_lastname', 'drivers_passport', 'drivers_licence', 'blacklist_date', 'comment'], 'safe'],
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
        $query = Drivers::find();

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
            'drivers_title' => $this->drivers_title,
            'appilcant_id' => $this->appilcant_id,
            'docs' => $this->docs,
            'status' => $this->status,
            'blacklist_status' => $this->blacklist_status,
            'create_at' => $this->create_at,
            'create_by' => $this->create_by,
            'update_at' => $this->update_at,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'drivers_name', $this->drivers_name])
            ->andFilterWhere(['like', 'drivers_lastname', $this->drivers_lastname])
            ->andFilterWhere(['like', 'drivers_passport', $this->drivers_passport])
            ->andFilterWhere(['like', 'drivers_licence', $this->drivers_licence])
            ->andFilterWhere(['like', 'blacklist_date', $this->blacklist_date])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
