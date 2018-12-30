<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Programador */

$this->title = Yii::t('app', 'Update').' '. Yii::t('app', '{modelClass}: ', [
    'modelClass' => 'Programador',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Programador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="programador-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
