<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Almuerzo */

$this->title = $model->idAlmuerzo;
$this->params['breadcrumbs'][] = ['label' => 'Almuerzos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="almuerzo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idAlmuerzo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idAlmuerzo], [
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
            'idAlmuerzo',
            'fecha',
            'hora',
            'persona_docPersona',
        ],
    ]) ?>

</div>
