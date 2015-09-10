<?php

namespace backend\modules\usermanagement\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\usermanagement\models\UserType;

/**
 * UserTypeSearch represents the model behind the search form about `backend\modules\usermanagement\models\UserType`.
 */
class UserTypeSearch extends UserType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['type', 'detail'], 'safe'],
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
        $query = UserType::find();

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
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
