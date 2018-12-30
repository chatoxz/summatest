<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TipoProgramador]].
 *
 * @see TipoProgramador
 */
class TipoProgramadorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TipoProgramador[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TipoProgramador|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
