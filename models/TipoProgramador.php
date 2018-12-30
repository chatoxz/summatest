<?php

namespace app\models;

use Yii;
use \app\models\base\TipoProgramador as BaseTipoProgramador;

/**
 * This is the model class for table "tipo_programador".
 */
class TipoProgramador extends BaseTipoProgramador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 155]
        ]);
    }
	
}
