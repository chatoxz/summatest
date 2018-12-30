<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\DisenadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use yii\helpers\Url;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Disenador');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disenador-index" id="id_gridview">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create').' '.Yii::t('app', 'Disenador')        , ['create'], ['class' => 'btn btn-success add-modal-data', 'title' => Yii::t('app', 'Create').' '.
            Yii::t('app', 'Disenador') ]) ?>
    </p>
    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        /* [
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
        ],*/
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'id_empleado',
            'label' => Yii::t('app', 'Empleado'),
            'value' => function($model){
                return $model->empleado->getNombre();
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\Empleado::find()->orderBy('id')->all(), 'id',
                function ($model, $default ) { return $model->getNombre(); } ),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Empleado', 'id' => 'grid-disenador-search-id_empleado']
        ],
        [
            'attribute' => 'id_tipo_disenador',
            'label' => Yii::t('app', 'Tipo Disenador'),
            'value' => function($model){
                return $model->tipoDisenador->nombre;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\TipoDisenador::find()->orderBy('id')->all(), 'id',
                function ($model, $default ) { return $model->getNombre(); } ),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Tipo disenador', 'id' => 'grid-disenador-search-id_tipo_disenador']
        ],
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-disenador']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => false,
                'dropdownOptions' => [
                    'label' => 'Todo',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Exportar todos los datos</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>

</div>
