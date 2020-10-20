<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TestQuestion;

/**
 * TestQuestionSearch represents the model behind the search form of `common\models\TestQuestion`.
 */
class TestQuestionSearch extends TestQuestion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count_answer', 'has_thumbnail', 'has_music', 'created_at'], 'integer'],
            [['question_id', 'name', 'timer', 'answer'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TestQuestion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'count_answer' => $this->count_answer,
            'timer' => $this->timer,
            'has_thumbnail' => $this->has_thumbnail,
            'has_music' => $this->has_music,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'question_id', $this->question_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'answer', $this->answer]);

        return $dataProvider;
    }
}
