<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use app\models\Memoria;

/* @var $this yii\web\View */
/* @var $model app\models\Memoria */

$this->title = $model->idmemoria;
$this->params['breadcrumbs'][] = ['label' => 'Memorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idmemoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idmemoria], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realmente quiere borrar esta memoria?',
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
            //'archivo',
            //'archivoMemoria',//Funcion de Memoria.php
           [   
                'attribute' => 'Archivo Memoria',
                'format' => 'raw',
                'value' => Html::a($model->archivo, 'download.php?filename='.$model->archivo, [
                            'alt'=>Yii::t('app', 'Archivo memoria '),
                            'title'=>Yii::t('app', 'Descargar memoria'),
                        ]),
            ],
             /*[   
                'label' => 'Archivo Memoria',
                'format' => 'raw',
                'value' => Memoria::getArchivoMemoria($model),
            ],*/
            'eventoIdevento.nombre',
        ],
    ]) ?>

</div>
