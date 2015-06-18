<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDoc */

$this->title = $model->idtipo_doc;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-doc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idtipo_doc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idtipo_doc], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realmente quieres borrar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idtipo_doc',
            'tipo_documento',
        ],
    ]) ?>

</div>
