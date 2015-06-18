<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoArea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idtipo_area')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'tipo_area')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
