<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ContactAddress;

/**
 * ContactAddressSearch represents the model behind the search form about `common\models\ContactAddress`.
 */
class ContactAddressSearch extends ContactAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'default_address', 'status', 'CB', 'UB'], 'integer'],
            [['address_title', 'address', 'telephone', 'fax', 'po_box', 'email', 'tech_solution_phone', 'general_trading_phone', 'it_phone', 'facility_management_phone', 'DOC', 'DOU'], 'safe'],
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
        $query = ContactAddress::find();

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
            'default_address' => $this->default_address,
            'status' => $this->status,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
        ]);

        $query->andFilterWhere(['like', 'address_title', $this->address_title])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'po_box', $this->po_box])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tech_solution_phone', $this->tech_solution_phone])
            ->andFilterWhere(['like', 'general_trading_phone', $this->general_trading_phone])
            ->andFilterWhere(['like', 'it_phone', $this->it_phone])
            ->andFilterWhere(['like', 'facility_management_phone', $this->facility_management_phone]);

        return $dataProvider;
    }
}
