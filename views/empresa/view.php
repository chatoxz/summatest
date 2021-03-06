<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */

$this->title = isset($model->nombre) ? $model->nombre : '' ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empresa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-view container-fluid">

    <div class="row">
        <div class="col-md-6  col-sm-8">
            <h2><?= Yii::t('app', 'Empresa').' '. Html::encode($this->title) ?></h2>
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
        'nombre',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerEmpleado->totalCount){
    $gridColumnEmpleado = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'nombre',
            'apellido',
            'edad',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerEmpleado,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-empleado']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Empleado')),
        ],
        'export' => false,
        'columns' => $gridColumnEmpleado
    ]);
}
?>

    </div>
</div>
