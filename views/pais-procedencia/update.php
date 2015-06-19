<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaisProcedencia */

$this->title = 'Actualizar País de Procedencia: ' . ' ' . $model->idpais_procedencia;
$this->params['breadcrumbs'][] = ['label' => 'Pais Procedencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpais_procedencia, 'url' => ['view', 'id' => $model->idpais_procedencia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pais-procedencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
