<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TaskProject;

/**
 * TaskProjectSearch represents the model behind the search form about `frontend\models\TaskProject`.
 */
class TaskProjectSearch extends TaskProject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'progress'], 'integer'],
            [['title', 'parent', 'detail'], 'safe'],
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
        $query = TaskProject::find();

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
            'progress' => $this->progress,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'parent', $this->parent])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
