<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ContactInfo;

/**
 * ContactInfoSearch represents the model behind the search form about `common\models\ContactInfo`.
 */
class ContactInfoSearch extends ContactInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'CB', 'UB'], 'integer'],
            [['email', 'general_trading_phone', 'it_phone', 'facility_management_phone', 'addtess', 'DOC'], 'safe'],
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
        $query = ContactInfo::find();

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
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'general_trading_phone', $this->general_trading_phone])
            ->andFilterWhere(['like', 'it_phone', $this->it_phone])
            ->andFilterWhere(['like', 'facility_management_phone', $this->facility_management_phone])
            ->andFilterWhere(['like', 'addtess', $this->addtess]);

        return $dataProvider;
    }
}
