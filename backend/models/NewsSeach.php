<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * NewsSeach represents the model behind the search form of `common\models\News`.
 */
class NewsSeach extends News
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title_uz', 'title_ru', 'title_en', 'content_uz', 'content_ru', 'content_en', 'author', 'pic', 'date'], 'safe'],
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
        $query = News::find();

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
        ]);

        $query->andFilterWhere(['like', 'title_uz', $this->title_uz])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'content_uz', $this->content_uz])
            ->andFilterWhere(['like', 'content_ru', $this->content_ru])
            ->andFilterWhere(['like', 'content_en', $this->content_en])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'pic', $this->pic])
            ->andFilterWhere(['like', 'date', $this->date]);

        return $dataProvider;
    }
}
