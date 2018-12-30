<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "tipo_programador".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property \app\models\Programador[] $programadors
 */
class TipoProgramador extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'programadors'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 155]
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
        return 'tipo_programador';
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
    public function getProgramadors()
    {
        return $this->hasMany(\app\models\Programador::className(), ['id_lenguaje' => 'id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\TipoProgramadorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TipoProgramadorQuery(get_called_class());
    }
}
