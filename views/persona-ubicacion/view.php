<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaUbicacion */

$this->title = $model->persona_docPersona;
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-ubicacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'persona_docPersona' => $model->persona_docPersona, 'ubicacion_idubicacion' => $model->ubicacion_idubicacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'persona_docPersona' => $model->persona_docPersona, 'ubicacion_idubicacion' => $model->ubicacion_idubicacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realmente quiere borrar esta inscripción?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'persona_docPersona',
            'personaDocPersona.nombre',
            'personaDocPersona.apellidos',
            //'tipo_persona_idtipo_persona',
            'tipoPersonaIdtipoPersona.tipo_persona',
            //'ubicacion_idubicacion',
            //'ubicacionIdubicacion.lugar',
            'nombreEvento',
            'ubicacionIdubicacion.lugar',
            'ubicacionIdubicacion.fecha',
            'ubicacionIdubicacion.hora_inicio',
            'ubicacionIdubicacion.hora_fin',

        ],
    ]) ?>

</div>
