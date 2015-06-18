<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Memoria */

$this->title = 'Update Memoria: ' . ' ' . $model->idmemoria;
$this->params['breadcrumbs'][] = ['label' => 'Memorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idmemoria, 'url' => ['view', 'id' => $model->idmemoria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="memoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
