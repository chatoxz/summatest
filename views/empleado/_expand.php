<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;

/*
$items[] = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Empleado')),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ]
];
*/
if(!empty($model->disenadors) ){
    $items[] =
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Disenador')),
            'content' => $this->render('_dataDisenador', [
                'model' => $model,
                'row' => $model->disenadors,
            ]),
        ];
}

if(!empty($model->programadors)){
    $items[] =
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode(Yii::t('app', 'Programador')),
            'content' => $this->render('_dataProgramador', [
                'model' => $model,
                'row' => $model->programadors,
            ]),
        ];
}

if(!empty($items) ){
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
}else{
    echo "Este empleado no tiene un rol definido.";
}
?>
