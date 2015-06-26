<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Evento;
use app\models\Persona;
use app\models\TipoPersona;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaEvento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-evento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'evento_idevento')->dropDownList(
        ArrayHelper::map(Evento::find()->all(),'idevento','nombre'),
        ['prompt'=>'Seleccione Evento']
    ) ?>

    <?= $form->field($model, 'persona_idpersona')->dropDownList(
        ArrayHelper::map(Persona::find()->all(),'docPersona','documentoNombre'),
        ['prompt'=>'Seleccione Persona']
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
