<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Empleado */

$this->title = Yii::t('app', 'Create').' '.Yii::t('app', 'Empleado');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleado'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
