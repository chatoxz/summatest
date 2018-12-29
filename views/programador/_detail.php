<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Programador */

?>
<div class="programador-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'empleado.nombre',
            'label' => Yii::t('app', 'Nombre '),
        ],
        [
            'attribute' => 'empleado.apellido',
            'label' => Yii::t('app', 'Apellido'),
        ],
        [
            'attribute' => 'lenguaje.nombre',
            'label' => Yii::t('app', 'Lenguaje'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>