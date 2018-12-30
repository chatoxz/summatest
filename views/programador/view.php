<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Programador */

$this->title = isset($model->nombre) ? $model->nombre : '' ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Programador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programador-view container-fluid">

    <div class="row">
        <div class="col-md-6  col-sm-8">
            <h2><?= Yii::t('app', 'Programador').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-md-5 col-sm-4" style="margin: 15px">
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->id], 
['class' => 'btn btn-info add-modal-data', 'title' => Yii::t('app', 'Save As New'), 'style' => 'margin-bottom:15px' ]) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], 
            ['class' => 'btn btn-primary add-modal-data', 'title' => Yii::t('app', 'Update'), 'style' => 'margin-bottom:15px']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'style' => 'margin-bottom:15px',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'empleado.nombre',
            'label' => Yii::t('app', 'Empleado'),
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
    <div class="row">
        <h4>Empleado</h4>
    <?php 
    $gridColumnEmpleado = [
        ['attribute' => 'id', 'visible' => false],
        'empresa.nombre',
        'nombre',
        'apellido',
        'edad',
    ];
    echo DetailView::widget([
        'model' => $model->empleado,
        'attributes' => $gridColumnEmpleado    ]);
    ?>
    </div>
        <div class="row">
        <h4>Tipo De Programador</h4>
    <?php 
    $gridColumnTipoProgramador = [
        ['attribute' => 'id', 'visible' => false],
        'nombre',
    ];
    echo DetailView::widget([
        'model' => $model->lenguaje,
        'attributes' => $gridColumnTipoProgramador    ]);
    ?>
    </div>
    </div>
