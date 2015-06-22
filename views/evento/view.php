<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evento */

$this->title = $model->idevento;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idevento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idevento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realemente quiere borrar este evento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idevento',
            'nombre',
            'descripcion',
            //'tipo_evento_idtipo_evento',
            'tipoEventoIdtipoEvento.tipo_evento',
            //'CCM_idCCM',
            'cCMIdCCM.ciudad',
            //'tipo_area_idtipo_area',
            'tipoAreaIdtipoArea.tipo_area',
        ],
    ]) ?>

</div>
