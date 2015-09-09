<?php

namespace backend\modules\configuration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\configuration\models\Province;

/**
 * ProvinceSearch represents the model behind the search form about `backend\modules\configuration\models\Province`.
 */
class ProvinceSearch extends Province
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['PRV_CODE', 'PRV_DESC', 'PRV_ABREV', 'PRV_ENG_DESC', 'PRV_ABREV_ENG', 'UPD_USER_CODE', 'LAST_UPD_DATE', 'CREATE_USER_CODE', 'CREATE_DATE', 'REGION_CODE', 'OLD_REGION_CODE', 'TRS_JOB_CODE', 'PRV_CODE_INSURE'], 'safe'],
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
        $query = Province::find();

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

        $query->andFilterWhere(['like', 'PRV_CODE', $this->PRV_CODE])
            ->andFilterWhere(['like', 'PRV_DESC', $this->PRV_DESC])
            ->andFilterWhere(['like', 'PRV_ABREV', $this->PRV_ABREV])
            ->andFilterWhere(['like', 'PRV_ENG_DESC', $this->PRV_ENG_DESC])
            ->andFilterWhere(['like', 'PRV_ABREV_ENG', $this->PRV_ABREV_ENG])
            ->andFilterWhere(['like', 'UPD_USER_CODE', $this->UPD_USER_CODE])
            ->andFilterWhere(['like', 'LAST_UPD_DATE', $this->LAST_UPD_DATE])
            ->andFilterWhere(['like', 'CREATE_USER_CODE', $this->CREATE_USER_CODE])
            ->andFilterWhere(['like', 'CREATE_DATE', $this->CREATE_DATE])
            ->andFilterWhere(['like', 'REGION_CODE', $this->REGION_CODE])
            ->andFilterWhere(['like', 'OLD_REGION_CODE', $this->OLD_REGION_CODE])
            ->andFilterWhere(['like', 'TRS_JOB_CODE', $this->TRS_JOB_CODE])
            ->andFilterWhere(['like', 'PRV_CODE_INSURE', $this->PRV_CODE_INSURE]);

        return $dataProvider;
    }
}
