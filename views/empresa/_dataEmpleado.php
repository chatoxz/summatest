<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\VarDumper;

$dataProvider = new ArrayDataProvider([
    'allModels' => $model->empleados,
    'key' => 'id'
]);
$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    ['attribute' => 'id', 'visible' => false],
    'nombre',
    'apellido',
    'edad',
    [
        'label' => 'Lenguaje',
        'attribute' => 'Programadors.id_lenguaje',
        'value' => function($model){
            return $model->getTipoLenguajes();
        },
    ],
    [
        'label' => 'Diseñador',
        'attribute' => 'Disenadors.id_lenguaje',
        'value' => function($model){
            $tipos = \app\models\TipoDisenador::find()->select(['tipo_disenador.nombre'])->joinWith('disenadors')
                ->where(['id_empleado' => $model->id])->all();
            $string = '';
            foreach ($tipos as $tipo){
                $string .= $tipo->nombre.' - ';
            }
            if(empty($string)) {
                return 'No es diseñador.';
            }
            return rtrim($string, ' - ');
            return $model->getTipoDisenadores();
        },
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'controller' => 'empleado'
    ],
];

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'containerOptions' => ['style' => 'overflow: auto'],
    'pjax' => true,
    'beforeHeader' => [
        [
            'options' => ['class' => 'skip-export']
        ]
    ],
    'export' => [
        'fontAwesome' => false
    ],
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'showPageSummary' => false,
    'persistResize' => false,
]);
