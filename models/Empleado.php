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
	
}
