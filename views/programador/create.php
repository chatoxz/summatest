<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Programador */

$this->title = Yii::t('app', 'Create').' '.Yii::t('app', 'Programador');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Programador'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programador-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
