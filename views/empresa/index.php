<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use yii\helpers\Url;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Empresa');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index" id="id_gridview">

    <h1><i class="far fa-igloo"></i><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create').' '.Yii::t('app', 'Empresa'),
            ['create'], ['class' => 'btn btn-success add-modal-data', 'title' => Yii::t('app', 'Create').' '.
                Yii::t('app', 'Empresa') ]) ?>
        <?= Html::a(Yii::t('app', 'Create').' '.Yii::t('app', 'Empleado'),
            ['/empleado/create'], ['class' => 'btn btn-info add-modal-data', 'title' => Yii::t('app', 'Create').' '.
                Yii::t('app', 'Empleado') ]) ?>
    </p>
    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        ['attribute' => 'id', 'visible' => true],
        'nombre',
        [
            'attribute' => 'edadPromedio',
            'label' => Yii::t('app', 'Edad Promedio'),
            'value' => function($model){
                return (int)$model->edadPromedio;
            },
        ],
        //'edadPromedio',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{save-as-new} {view} {update} {delete}',
            'buttons' => [
                'save-as-new' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Save As New']);
                },
            ],
        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-empresa']],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => false,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header"></li>',
                    ],
                ],
                'exportConfig' => [
                    //ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>

</div>