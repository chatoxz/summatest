<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "empresa".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property \app\models\Empleado[] $empleados
 */
class Empresa extends \yii\db\ActiveRecord
{
    public $edadPromedio;

    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'empleados'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 105]
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
    public function getEdadPromedio()
    {
        return $this->edadPromedio;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(\app\models\Empleado::className(), ['id_empresa' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\EmpresaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EmpresaQuery(get_called_class());
    }
}
