<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "disenador".
 *
 * @property integer $id
 * @property integer $id_empleado
 * @property integer $id_tipo_disenador
 *
 * @property \app\models\Empleado $empleado
 * @property \app\models\TipoDisenador $tipoDisenador
 */
class Disenador extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'empleado',
            'tipoDisenador'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado', 'id_tipo_disenador'], 'required'],
            [['id_empleado', 'id_tipo_disenador'], 'integer']
        ];
    }

    /**
    * @inheritdoc
    */
    public function getNombre()
    {
        return !empty($this->nombre) ? $this->nombre : $this->id ;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disenador';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_empleado' => Yii::t('app', 'Empleado'),
            'id_tipo_disenador' => Yii::t('app', 'Tipo de Disenador'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(\app\models\Empleado::className(), ['id' => 'id_empleado']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDisenador()
    {
        return $this->hasOne(\app\models\TipoDisenador::className(), ['id' => 'id_tipo_disenador']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\DisenadorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\DisenadorQuery(get_called_class());
    }
}
