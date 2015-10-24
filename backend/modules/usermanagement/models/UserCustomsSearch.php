<?php

namespace backend\modules\usermanagement\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\usermanagement\models\UserCustoms;

/**
 * UserCustomsSearch represents the model behind the search form about `backend\modules\usermanagement\models\UserCustoms`.
 */
class UserCustomsSearch extends UserCustoms
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'emp_id', 'id_no', 'user_id'], 'integer'],
            [['name', 'lname', 'off_code', 'br_code', 'org_code'], 'safe'],
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
        $query = UserCustoms::find();

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
            'title' => $this->title,
            'emp_id' => $this->emp_id,
            'id_no' => $this->id_no,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'off_code', $this->off_code])
            ->andFilterWhere(['like', 'br_code', $this->br_code])
            ->andFilterWhere(['like', 'org_code', $this->org_code]);

        return $dataProvider;
    }
}
