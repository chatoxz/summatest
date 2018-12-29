<?php

namespace app\models;

use Yii;
use \app\models\base\Programador as BaseProgramador;

/**
 * This is the model class for table "programador".
 */
class Programador extends BaseProgramador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id_empleado', 'id_lenguaje'], 'required'],
            [['id_empleado', 'id_lenguaje'], 'integer']
        ]);
    }
	
}
