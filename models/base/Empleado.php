<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "empleado".
 *
 * @property integer $id
 * @property integer $id_empresa
 * @property string $nombre
 * @property string $apellido
 * @property integer $edad
 *
 * @property \app\models\Disenador[] $disenadors
 * @property \app\models\Empresa $empresa
 * @property \app\models\Programador[] $programadors
 */
class Empleado extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'disenadors',
            'empresa',
            'programadors'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa', 'nombre', 'apellido', 'edad'], 'required'],
            [['id_empresa', 'edad'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 155]
        ];
    }

    /**
    * @inheritdoc
    */
    public function getNombre()
    {
        return !empty($this->nombre) ? $this->apellido.' '.$this->nombre : $this->id ;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_empresa' => Yii::t('app', 'Empresa'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'edad' => Yii::t('app', 'Edad'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisenadors()
    {
        return $this->hasMany(\app\models\Disenador::className(), ['id_empleado' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(\app\models\Empresa::className(), ['id' => 'id_empresa']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramadors()
    {
        return $this->hasMany(\app\models\Programador::className(), ['id_empleado' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\EmpleadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\EmpleadoQuery(get_called_class());
    }
}
