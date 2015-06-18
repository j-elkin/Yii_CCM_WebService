<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Memoria */

$this->title = $model->idmemoria;
$this->params['breadcrumbs'][] = ['label' => 'Memorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idmemoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idmemoria], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idmemoria',
            'nombre',
            'descripcion',
            'archivo',
            'evento_idevento',
        ],
    ]) ?>

</div>
