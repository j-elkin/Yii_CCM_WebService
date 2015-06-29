<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaUbicacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-ubicacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'persona_docPersona') ?>

    <?= $form->field($model, 'ubicacion_idubicacion') ?>

    <?= $form->field($model, 'tipo_persona_idtipo_persona') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
