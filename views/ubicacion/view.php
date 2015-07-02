<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ubicacion */

$this->title = $model->idubicacion;
$this->params['breadcrumbs'][] = ['label' => 'Ubicaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ubicacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idubicacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idubicacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realmente quiere borrar esta ubicación?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idubicacion',
            'eventoIdevento.nombre',
            'lugar',
            'fecha',
            'hora_inicio',
            'hora_fin',
            'limite_cupos',
            'cupos_disponibles',
        ],
    ]) ?>

</div>
