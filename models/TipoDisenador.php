<?php

namespace app\models;

use Yii;
use \app\models\base\TipoDisenador as BaseTipoDisenador;

/**
 * This is the model class for table "tipo_disenador".
 */
class TipoDisenador extends BaseTipoDisenador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255]
        ]);
    }
	
}
