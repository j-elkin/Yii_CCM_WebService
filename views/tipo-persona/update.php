<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoPersona */

$this->title = 'Update Tipo Persona: ' . ' ' . $model->idtipo_persona;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtipo_persona, 'url' => ['view', 'id' => $model->idtipo_persona]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
