<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Prueba;

/**
 * PruebaSearch represents the model behind the search form about `backend\models\Prueba`.
 */
class PruebaSearch extends Prueba
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idCaso', 'tamanio', 'nroOperaciones'], 'integer'],
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
        $query = Prueba::find();

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
            'idCaso' => $this->idCaso,
            'tamanio' => $this->tamanio,
            'nroOperaciones' => $this->nroOperaciones,
        ]);

        return $dataProvider;
    }
}
