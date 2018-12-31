<?php

namespace app\models;

use Yii;
use \app\models\base\Empleado as BaseEmpleado;

/**
 * This is the model class for table "empleado".
 */
class Empleado extends BaseEmpleado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_empresa', 'nombre', 'apellido', 'edad'], 'required'],
            [['id_empresa', 'edad'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 155]
        ]);
    }
    public function getTipoLenguajes(){
        $tipos = \app\models\TipoProgramador::find()->select(['tipo_programador.nombre'])->joinWith('programadors')
            ->where(['id_empleado' => $this->id])->all();
        $string = '';
        foreach ($tipos as $tipo){
            $string .= $tipo->nombre.' - ';
        }
        if(empty($string)) {
            return "No es programador";
        }
        return rtrim($string, ' - ');
    }
    public function getTipoDisenadores(){
        $tipos = \app\models\TipoProgramador::find()->select(['tipo_disenador.nombre'])->joinWith('disenadors')
            ->where(['id_empleado' => $this->id])->all();
        $string = '';
        foreach ($tipos as $tipo){
            $string .= $tipo->nombre.' - ';
        }
        if(empty($string)) {
            return "No es diseñador";
        }
        return rtrim($string, ' - ');
    }
}
