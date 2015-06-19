<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaisProcedencia */

$this->title = $model->idpais_procedencia;
$this->params['breadcrumbs'][] = ['label' => 'Pais Procedencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pais-procedencia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idpais_procedencia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idpais_procedencia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realmente quiere borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpais_procedencia',
            'nombre',
        ],
    ]) ?>

</div>
