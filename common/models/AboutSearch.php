<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\About;

/**
 * AboutSearch represents the model behind the search form about `common\models\About`.
 */
class AboutSearch extends About
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'CB', 'UB'], 'integer'],
            [['about_avensia', 'about_avensia_image', 'about_general_trending', 'general_trending_image', 'about_tech_solution', 'tech_solution_image', 'about_facility_management', 'facility_management_image', 'about_it', 'it_image', 'DOC', 'DOU'], 'safe'],
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
        $query = About::find();

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
            'status' => $this->status,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
        ]);

        $query->andFilterWhere(['like', 'about_avensia', $this->about_avensia])
            ->andFilterWhere(['like', 'about_avensia_image', $this->about_avensia_image])
            ->andFilterWhere(['like', 'about_general_trending', $this->about_general_trending])
            ->andFilterWhere(['like', 'general_trending_image', $this->general_trending_image])
            ->andFilterWhere(['like', 'about_tech_solution', $this->about_tech_solution])
            ->andFilterWhere(['like', 'tech_solution_image', $this->tech_solution_image])
            ->andFilterWhere(['like', 'about_facility_management', $this->about_facility_management])
            ->andFilterWhere(['like', 'facility_management_image', $this->facility_management_image])
            ->andFilterWhere(['like', 'about_it', $this->about_it])
            ->andFilterWhere(['like', 'it_image', $this->it_image]);

        return $dataProvider;
    }
}
