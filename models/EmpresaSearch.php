<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresa;

/**
 * app\models\EmpresaSearch represents the model behind the search form about `app\models\Empresa`.
 */
 class EmpresaSearch extends Empresa
{

    public $edadPromedio;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre'], 'safe'],
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
        $query = Empresa::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->select([ 'empresa.id','empresa.nombre','AVG(edad) edadPromedio']);
        $query->joinWith('empleados');
        $query->groupBy(['empresa.id']);

        $query->andFilterWhere([
            'empresa.id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'empresa.nombre', $this->nombre]);

        return $dataProvider;
    }
}
