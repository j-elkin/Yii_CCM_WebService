<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaEvento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-evento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'evento_idevento')->textInput() ?>

    <?= $form->field($model, 'persona_idpersona')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
