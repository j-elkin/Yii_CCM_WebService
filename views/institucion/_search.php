<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstitucionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institucion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idinstitucion') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'pais') ?>

    <?= $form->field($model, 'ciudad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
