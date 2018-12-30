<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;

$items = [
    /*[
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Empresa')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],*/
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Empleado')),
        'content' => $this->render('_dataEmpleado', [
            'model' => $model,
            'row' => $model->empleados,
        ]),
    ],
];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
