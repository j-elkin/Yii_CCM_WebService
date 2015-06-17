<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDoc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-doc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idtipo_doc')->textInput() ?>

    <?= $form->field($model, 'tipo_documento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
