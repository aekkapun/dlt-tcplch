<?php

namespace backend\modules\permitapp\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\permitapp\models\PermitApp;

/**
 * PermitAppSearch represents the model behind the search form about `backend\modules\permitapp\models\PermitApp`.
 */
class PermitAppSearch extends PermitApp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'age', 'province', 'country', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'request_chanel', 'created_at', 'updated_at', 'cretaed_by', 'updated_by', 'approve_status', 'approve_by', 'approve_comment', 'dlt_office', 'dlt_br'], 'integer'],
            [['fullname', 'passport', 'address', 'telephone', 'car_enroll_country', 'plates_number', 'start_date', 'end_date', 'approve_date'], 'safe'],
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
        $query = PermitApp::find();

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
            'gender' => $this->gender,
            'age' => $this->age,
            'province' => $this->province,
            'country' => $this->country,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'start_province' => $this->start_province,
            'start_border_point' => $this->start_border_point,
            'target_province' => $this->target_province,
            'out_province' => $this->out_province,
            'out_border_point' => $this->out_border_point,
            'request_chanel' => $this->request_chanel,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'cretaed_by' => $this->cretaed_by,
            'updated_by' => $this->updated_by,
            'approve_status' => $this->approve_status,
            'approve_by' => $this->approve_by,
            'approve_date' => $this->approve_date,
            'approve_comment' => $this->approve_comment,
            'dlt_office' => $this->dlt_office,
            'dlt_br' => $this->dlt_br,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'car_enroll_country', $this->car_enroll_country])
            ->andFilterWhere(['like', 'plates_number', $this->plates_number]);

        return $dataProvider;
    }
}
