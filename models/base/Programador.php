<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "programador".
 *
 * @property integer $id
 * @property integer $id_empleado
 * @property integer $id_lenguaje
 *
 * @property \app\models\Empleado $empleado
 * @property \app\models\TipoProgramador $lenguaje
 */
class Programador extends \yii\db\ActiveRecord
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
            'lenguaje'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado', 'id_lenguaje'], 'required'],
            [['id_empleado', 'id_lenguaje'], 'integer']
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
        return 'programador';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_empleado' => Yii::t('app', 'Empleado'),
            'id_lenguaje' => Yii::t('app', 'Lenguaje'),
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
    public function getLenguaje()
    {
        return $this->hasOne(\app\models\TipoProgramador::className(), ['id' => 'id_lenguaje']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\ProgramadorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProgramadorQuery(get_called_class());
    }
}
