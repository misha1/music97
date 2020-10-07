<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Music;

/**
 * MusicSearch represents the model behind the search form of `common\models\Music`.
 */
class MusicSearch extends Music
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['music_id', 'title', 'description', 'lyrics', 'music_name', 'author_name'], 'safe'],
            [['status', 'created_at', 'updated_at', 'created_by', 'has_thumbnail', 'has_minus'], 'integer'],
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
        $query = Music::find();

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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'has_thumbnail' => $this->has_thumbnail,
            'has_minus' => $this->has_minus,
        ]);

        $query->andFilterWhere(['like', 'music_id', $this->music_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'lyrics', $this->lyrics])
            ->andFilterWhere(['like', 'music_name', $this->music_name])
            ->andFilterWhere(['like', 'author_name', $this->author_name]);

        return $dataProvider;
    }
}
