<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoEvento */

$this->title = 'Update Tipo Evento: ' . ' ' . $model->idtipo_evento;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtipo_evento, 'url' => ['view', 'id' => $model->idtipo_evento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-evento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
