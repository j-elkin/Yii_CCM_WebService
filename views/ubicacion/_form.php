<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Evento;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Ubicacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ubicacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idubicacion')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'hora_inicio')->widget(DateTimePicker::className(), [
        'language' => 'es',
        'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => false,
        'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            //'linkFormat' => 'HH:ii P', // if inline = true
             'format' => 'HH:ii P', // if inline = false
            'todayBtn' => true
        ]
    ]);?>

    <?= $form->field($model, 'hora_fin')->widget(DateTimePicker::className(), [
        'language' => 'es',
        'size' => 'ms',
        'template' => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline' => false,
        'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            //'linkFormat' => 'HH:ii P', // if inline = true
             'format' => 'HH:ii p', // if inline = false
            'todayBtn' => true
        ]
    ]);?>

    <?= $form->field($model, 'lugar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'language' => 'es',
             'inline' => true, 
             // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>

    <?= $form->field($model, 'evento_idevento')->dropDownList(
        ArrayHelper::map(Evento::find()->all(),'idevento','nombre'),
        ['prompt'=>'Seleccione Evento']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
