<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpleadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-empleado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_empresa')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Empresa::find()->orderBy('id')->all(),
            'id', function ($model, $default ) { return $model->getNombre(); }),
        'options' => ['placeholder' => Yii::t('app', ' Empresa')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true, 'placeholder' => 'Apellido']) ?>

    <?= $form->field($model, 'edad')->textInput(['placeholder' => 'Edad']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
