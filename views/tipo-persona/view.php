<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipoPersona */

$this->title = $model->idtipo_persona;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idtipo_persona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idtipo_persona], [
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
            'idtipo_persona',
            'tipo_persona',
        ],
    ]) ?>

</div>
