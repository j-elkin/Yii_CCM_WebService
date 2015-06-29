<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TipoPersona;
use app\models\Ubicacion;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaUbicacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-ubicacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'persona_docPersona')->dropDownList(
        ArrayHelper::map(Persona::find()->all(),'docPersona','documentoNombre'),
        ['prompt'=>'Seleccione Persona']
    ) ?>

    <?= $form->field($model, 'ubicacion_idubicacion')->dropDownList(
        ArrayHelper::map(Ubicacion::find()->all(),'idubicacion','eventoUbicacion'),
        ['prompt'=>'Seleccione ubicación']
    ) ?>

    <?= $form->field($model, 'tipo_persona_idtipo_persona')->dropDownList(
        ArrayHelper::map(TipoPersona::find()->all(),'idtipo_persona','tipo_persona'),
        ['prompt'=>'Seleccione persona']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
