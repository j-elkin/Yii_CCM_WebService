<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idevento',
            'nombre',
            'descripcion',
            //'tipo_evento_idtipo_evento',
            [
                'attribute'=>'tipo_evento_idtipo_evento',
                'value'=>'tipoEventoIdtipoEvento.tipo_evento',
            ],
            //'CCM_idCCM',
            [
                'attribute'=>'CCM_idCCM',
                'value'=>'cCMIdCCM.ciudad',
            ],
            //'tipo_area_idtipo_area',
            [
                'attribute'=>'tipo_area_idtipo_area',
                'value'=>'tipoAreaIdtipoArea.tipo_area',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
