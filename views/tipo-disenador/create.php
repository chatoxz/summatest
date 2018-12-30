<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoDisenador */

$this->title = Yii::t('app', 'Create').' '.Yii::t('app', 'Tipo Disenador');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Disenador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-disenador-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
