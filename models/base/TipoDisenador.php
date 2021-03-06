<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "tipo_disenador".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property \app\models\Disenador[] $disenadors
 */
class TipoDisenador extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'disenadors'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255]
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
        return 'tipo_disenador';
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
    public function getDisenadors()
    {
        return $this->hasMany(\app\models\Disenador::className(), ['id_tipo_disenador' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\TipoDisenadorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TipoDisenadorQuery(get_called_class());
    }
}
