<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Disenador */

$this->title = Yii::t('app', 'Create').' '.Yii::t('app', 'Disenador');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Disenador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disenador-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
