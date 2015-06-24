<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->docPersona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->docPersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->docPersona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realmente quiere borrar esta persona?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'docPersona',
            'nombre',
            'apellidos',
            'genero',
            'fecha_nacimiento',
            'correo_electronico',
            'telefono',
            //'codigo_qr',
            //'displayImage',
            'tipoDocIdtipoDoc.tipo_documento',
            'paisProcedenciaIdpaisProcedencia.nombre',
            'institucionIdinstitucion.nombre',
            'tipoPersonaIdtipoPersona.tipo_persona',
            /*[   
                'label' => 'Código QR',
                'format' => 'raw',
                'value' => 'displayImage',
            ],*/
            [   
                'label' => 'Código QR',
                'format' => 'raw',
                'value' => Persona::getDisplayImage($model),
            ],
        ],
    ]) ?>

   <!--  <?php
        //echo $model->displayImage;
    ?> -->
    <!-- <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $model->docPersona;?>&amp;size=220x220&amp;format=png" alt="Prueba" title="Código QR <?php echo $model->docPersona;?>" /> -->

</div>

