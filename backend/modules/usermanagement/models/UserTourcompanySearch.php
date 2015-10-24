<?php

namespace backend\modules\usermanagement\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\usermanagement\models\UserTourcompany;

/**
 * UserTourcompanySearch represents the model behind the search form about `backend\modules\usermanagement\models\UserTourcompany`.
 */
class UserTourcompanySearch extends UserTourcompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'license_no', 'user_id', 'province', 'amphur', 'zipcode'], 'integer'],
            [['trader_name', 'trader_name_en', 'trader_category', 'effective_date', 'expire_date', 'address', 'mobile_no', 'telephone', 'email'], 'safe'],
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
        $query = UserTourcompany::find();

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
            'license_no' => $this->license_no,
            'effective_date' => $this->effective_date,
            'expire_date' => $this->expire_date,
            'user_id' => $this->user_id,
            'province' => $this->province,
            'amphur' => $this->amphur,
            'zipcode' => $this->zipcode,
        ]);

        $query->andFilterWhere(['like', 'trader_name', $this->trader_name])
            ->andFilterWhere(['like', 'trader_name_en', $this->trader_name_en])
            ->andFilterWhere(['like', 'trader_category', $this->trader_category])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'mobile_no', $this->mobile_no])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
