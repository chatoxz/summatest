<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Disenador;

/**
 * app\models\DisenadorSearch represents the model behind the search form about `app\models\Disenador`.
 */
 class DisenadorSearch extends Disenador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_empleado', 'id_tipo_disenador'], 'integer'],
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
        $query = Disenador::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->getSort()->attributes['id_empleado'] = [
            'asc' => ['empleado.apellido' => SORT_ASC],
            'desc' => ['empleado.apellido' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('empleado');

        $query->andFilterWhere([
            'id' => $this->id,
            'id_empleado' => $this->id_empleado,
            'id_tipo_disenador' => $this->id_tipo_disenador,
        ]);

        return $dataProvider;
    }
}
