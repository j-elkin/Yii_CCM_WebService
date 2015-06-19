<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\TipoDoc;
use app\models\PaisProcedencia;
use app\models\Institucion;
use app\models\TipoPersona;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'docPersona')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genero')->dropDownList(
        ['Femenino' => 'Femenino', 'Masculino' => 'Masculino'],
        ['prompt'=>'Seleccione género']
    ) ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput(['maxlength' => true]) ?>

 
 

    <?= $form->field($model, 'correo_electronico')->input('email') ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_qr')->fileInput() ?>
    
    <?= $form->field($model, 'tipo_doc_idtipo_doc')->dropDownList(
        ArrayHelper::map(TipoDoc::find()->all(),'idtipo_doc','tipo_documento'),
        ['prompt'=>'Seleccione documento']
    ) ?>
    
    <?= $form->field($model, 'pais_procedencia_idpais_procedencia')->dropDownList(
        ArrayHelper::map(PaisProcedencia::find()->all(),'idpais_procedencia','nombre'),
        ['prompt'=>'Seleccione país']
    ) ?>

    <?= $form->field($model, 'institucion_idinstitucion')->dropDownList(
        ArrayHelper::map(Institucion::find()->all(),'idinstitucion','nombre'),
        ['prompt'=>'Seleccione institución']
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
