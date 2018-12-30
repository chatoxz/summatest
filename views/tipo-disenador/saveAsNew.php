<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoDisenador */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Tipo Disenador',
]). ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Disenador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="tipo-disenador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
