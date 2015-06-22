<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaEvento */

$this->title = 'Actualizar Persona en Evento: ' . ' ' . $model->evento_idevento;
$this->params['breadcrumbs'][] = ['label' => 'Persona Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->evento_idevento, 'url' => ['view', 'evento_idevento' => $model->evento_idevento, 'persona_idpersona' => $model->persona_idpersona]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="persona-evento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
