<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Disenador */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Disenador',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Disenador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="disenador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
