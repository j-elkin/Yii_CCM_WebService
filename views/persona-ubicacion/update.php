<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaUbicacion */

$this->title = 'Actualizar inscripción: ' . ' ' . $model->persona_docPersona;
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->persona_docPersona, 'url' => ['view', 'persona_docPersona' => $model->persona_docPersona, 'ubicacion_idubicacion' => $model->ubicacion_idubicacion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="persona-ubicacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
