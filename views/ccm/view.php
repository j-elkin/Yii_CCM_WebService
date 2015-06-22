<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ccm */

$this->title = $model->idCCM;
$this->params['breadcrumbs'][] = ['label' => 'Ccms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ccm-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idCCM], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idCCM], [
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
            'idCCM',
            'ciudad',
            'direccion',
            'telefono',
            'fecha_inicio',
            'fecha_fin',
        ],
    ]) ?>

</div>
