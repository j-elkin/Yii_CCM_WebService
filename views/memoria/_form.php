<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Evento;

/* @var $this yii\web\View */
/* @var $model app\models\Memoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="memoria-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);//importante para la carga de archivos ?>

    <?= $form->field($model, 'idmemoria')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'archivo_memoria')->fileInput() ?>-->
    <?= $form->field($model, 'archivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'evento_idevento')->dropDownList(
        ArrayHelper::map(Evento::find()->all(),'idevento','nombre'),
        ['prompt'=>'Seleccione Evento']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
