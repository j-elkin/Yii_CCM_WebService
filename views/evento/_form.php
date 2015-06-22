<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TipoEvento;
use app\models\Ccm;
use app\models\TipoArea;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idevento')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_evento_idtipo_evento')->dropDownList(
        ArrayHelper::map(TipoEvento::find()->all(),'idtipo_evento','tipo_evento'),
        ['prompt'=>'Seleccione tipo de evento']
    ) ?>

    <?= $form->field($model, 'CCM_idCCM')->dropDownList(
        ArrayHelper::map(Ccm::find()->all(),'idCCM','ciudad'),
        ['prompt'=>'Seleccione CCM']
    ) ?>

    <?= $form->field($model, 'tipo_area_idtipo_area')->dropDownList(
        ArrayHelper::map(TipoArea::find()->all(),'idtipo_area','tipo_area'),
        ['prompt'=>'Seleccione Tipo de Área']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
