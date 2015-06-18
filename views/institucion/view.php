<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Institucion */

$this->title = $model->idinstitucion;
$this->params['breadcrumbs'][] = ['label' => 'Institucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institucion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idinstitucion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idinstitucion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realmente que quieres borar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idinstitucion',
            'nombre',
            'pais',
            'ciudad',
        ],
    ]) ?>

</div>
