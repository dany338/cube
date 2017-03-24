<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Detalleprueba;

/**
 * DetallepruebaSearch represents the model behind the search form about `backend\models\Detalleprueba`.
 */
class DetallepruebaSearch extends Detalleprueba
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idPrueba', 'idOperation', 'cordX1', 'cordY1', 'cordZ1', 'cordX2', 'cordY2', 'cordZ2', 'vlrW', 'resultado'], 'integer'],
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
        $query = Detalleprueba::find();

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
            'idPrueba' => $this->idPrueba,
            'idOperation' => $this->idOperation,
            'cordX1' => $this->cordX1,
            'cordY1' => $this->cordY1,
            'cordZ1' => $this->cordZ1,
            'cordX2' => $this->cordX2,
            'cordY2' => $this->cordY2,
            'cordZ2' => $this->cordZ2,
            'vlrW' => $this->vlrW,
            'resultado' => $this->resultado,
        ]);

        return $dataProvider;
    }
}
