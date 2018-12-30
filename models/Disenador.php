<?php

namespace app\models;

use Yii;
use \app\models\base\Disenador as BaseDisenador;

/**
 * This is the model class for table "disenador".
 */
class Disenador extends BaseDisenador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_empleado', 'id_tipo_disenador'], 'required'],
            [['id_empleado', 'id_tipo_disenador'], 'integer']
        ]);
    }
	
}
