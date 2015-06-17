<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CcmSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ccm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCCM') ?>

    <?= $form->field($model, 'ciudad') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'telefono') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?php // echo $form->field($model, 'fecha_fin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
