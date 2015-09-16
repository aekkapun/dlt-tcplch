<?php

namespace backend\modules\guide\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\guide\models\TourCompany;

/**
 * TourCompanySearch represents the model behind the search form about `backend\modules\guide\models\TourCompany`.
 */
class TourCompanySearch extends TourCompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mobile_no', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'], 'integer'],
            [['license_no', 'trader_name', 'trader_name_en', 'category', 'effective_date', 'expire_date', 'address', 'province', 'amphur', 'district', 'zipcode', 'telephone', 'email'], 'safe'],
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
        $query = TourCompany::find();

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
            'effective_date' => $this->effective_date,
            'expire_date' => $this->expire_date,
            'mobile_no' => $this->mobile_no,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'license_no', $this->license_no])
            ->andFilterWhere(['like', 'trader_name', $this->trader_name])
            ->andFilterWhere(['like', 'trader_name_en', $this->trader_name_en])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'amphur', $this->amphur])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
