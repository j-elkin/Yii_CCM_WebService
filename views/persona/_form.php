<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\TipoDoc;
use app\models\PaisProcedencia;
use app\models\Institucion;
use app\models\TipoPersona;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); //importante?>

    <?= $form->field($model, 'docPersona')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genero')->dropDownList(
        ['Femenino' => 'Femenino', 'Masculino' => 'Masculino'],
        ['prompt'=>'Seleccione género']
    ) ?>

    <?= $form->field($model, 'correo_electronico')->input('email') ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
    
    <!--<?= $form->field($model, 'file_qr')->fileInput() ?>-->
    <!--<img src="<?php //echo Yii::$app->params['uploadPath'].'codigo_qr_question.jpg' ?>"> -->

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

    <?= $form->field($model, 'fecha_nacimiento')->widget(
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

    <!-- <img id="QrCode" src="/Yii_CCM_WebService/web/uploads/codigo_qr_question.jpg" style="display:none;">  -->
    <img id="QrCode" src="" style="display:none;">
    <br></br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript" src="/Yii_CCM_WebService/web/assets/6beff9cc/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       
        $('#persona-docpersona').focusout(function(event) {
            var documento = $('#persona-docpersona').val();
            //para el caso de registro: Se muestra el Código QR generado
            if(documento != ""){
                if( documento.match(/^[0-9]*$/) ){
                    //console.log("es numero");
                    $('#QrCode').attr('src','https://api.qrserver.com/v1/create-qr-code/?data='+documento+'&amp;size=220x220&amp;format=png');
                    $("#QrCode").attr('title', 'Código Qr para '+documento);
                    $('#QrCode').show('fast');
                }
                else{
                    //console.log("No es numero");
                    $('#QrCode').hide('fast');
                }
            }
            else{
                //console.log("Vacio");
                $('#QrCode').hide('fast');
            }
        });
    });
</script>
