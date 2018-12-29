<?php

namespace app\models;

use Yii;
use \app\models\base\Empresa as BaseEmpresa;

/**
 * This is the model class for table "empresa".
 */
class Empresa extends BaseEmpresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 105],
            [['edadPromedio'], 'safe'],
 ]);
    }
	
}
