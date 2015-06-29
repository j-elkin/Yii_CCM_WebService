<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Persona;
use kartik\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Almuerzo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="almuerzo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'persona_docPersona')->dropDownList(
    	ArrayHelper::map(Persona::find()->all(), 'docPersona', 'documentoNombre'),
    	['prompt' => 'Seleccione documento:' ]
    )?>
    <div id="alertaAlmuerzos" >
	    <?php
    		// echo Alert::widget([
      //               'type' => Alert::TYPE_WARNING,
      //               'title' => 'Almuerzos consumidos!',
      //               'icon' => 'glyphicon glyphicon-exclamation-sign',
      //               'body' => 'La persona seleccionada ya consumio todos los almuerzos.',
      //               'showSeparator' => true
      //           ]);
  	 	 ?>
    </div>
    
    <?= $form->field($model, 'hora')->widget(DateTimePicker::className(), [
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

    <?= $form->field($model, 'fecha')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'language' => 'es',
             'inline' => true, 
             // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'todayBtn' => 'linked',
                'todayHighlight' => true
            ]
    ]);?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
 

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript" src="/Yii_CCM_WebService/web/assets/6beff9cc/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       
     //    $('#almuerzo-persona_docpersona').focusout(function(event) {
     //        var documento = $('#almuerzo-persona_docpersona').val();
     //        //para el caso de registro: Se muestra el Código QR generado
     //        $('#alertaAlmuerzos').html("elkin");
     //        $alerta = "<?php
		   //  		 		echo Alert::widget([
		   //                  	'type' => Alert::TYPE_WARNING,
		   //                   	'title' => 'Almuerzos consumidos!',
			  //                    'icon' => 'glyphicon glyphicon-exclamation-sign',
			  //                    'body' => 'La persona seleccionada ya consumio todos los almuerzos.',
			  //                    'showSeparator' => true
		   //               	]);
		  	//  	 		?>";
		  	// $alerta = $alerta.replace("<", "x", $alerta); 
		  	// console.log($alerta);
  	 	 	
     //    });
    });
</script>
