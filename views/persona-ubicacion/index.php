<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaUbicacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscripciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-ubicacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Inscribir persona', ['value'=>Url::to('create'), 'class' => 'btn btn-success', 'id' => 'modalButton' ]) ?>
    </p>
    <?php
        Modal::begin([
                'header' => '<h4><b>INSCRIPCIÓN A EVENTO</b></h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);
        
        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'persona_docPersona',
            //'ubicacion_idubicacion',
            //'ubicacionIdubicacion.lugar',
             //'tipo_persona_idtipo_persona',
            [
                'attribute'=>'tipo_persona_idtipo_persona',
                'value'=>'tipoPersonaIdtipoPersona.tipo_persona',
            ],
            [
                'attribute'=>'Evento',
                'value'=>'nombreEvento',
            ],
            [
                'attribute'=>'ubicacion_idubicacion',
                'value'=>'ubicacionIdubicacion.lugar',
            ],
            [
                'attribute'=>'Fecha',
                'value'=>'ubicacionIdubicacion.fecha',
            ],
            [
                'attribute'=>'Hora Inicio',
                'value'=>'ubicacionIdubicacion.hora_inicio',
            ],
            
            /*[
                'attribute'=>'ubicacion_idubicacion',
                'value'=>'ubicacionEventoCompleta',
            ],*/

           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
