<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoProgramador */

$this->title = Yii::t('app', 'Create').' '.Yii::t('app', 'Tipo Programador');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Programador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-programador-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
