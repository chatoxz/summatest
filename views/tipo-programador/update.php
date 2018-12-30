<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoProgramador */

$this->title = Yii::t('app', 'Update').' '. Yii::t('app', '{modelClass}: ', [
    'modelClass' => 'Tipo Programador',
]) . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Programador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipo-programador-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
