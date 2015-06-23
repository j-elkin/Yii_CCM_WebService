<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Memorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Memoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idmemoria',
            'nombre',
            'descripcion',
            //'archivo',
            //'archivoMemoria',//Funcion de Memoria.php
            
            [   
                'label' => 'Archivo Memoria',
                'format' => 'raw',
                'value' => 'archivoMemoria',
            ],

            //'evento_idevento',
            //'eventoIdevento.nombre',
            [
                'attribute'=>'evento_idevento',
                'value'=>'eventoIdevento.nombre',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
