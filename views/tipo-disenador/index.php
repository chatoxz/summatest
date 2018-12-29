<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoDisenadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use yii\helpers\Url;
use kartik\grid\GridView;

$this->title = Yii::t('app', 'Tipo de Disenador');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-disenador-index" id="id_gridview">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create').' '.Yii::t('app', 'Tipo de Disenador')        , ['create'], ['class' => 'btn btn-success add-modal-data', 'title' => Yii::t('app', 'Create').' '.
        Yii::t('app', 'Tipo de Disenador') ]) ?>
    </p>
            <?php 
        $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
                                    ['attribute' => 'id', 'visible' => false],
                                    'nombre',
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
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-tipo-disenador']],
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
