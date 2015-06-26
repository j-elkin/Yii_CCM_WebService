<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaEventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas en Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-evento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inscribir Persona a Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'evento_idevento',
            [
                'attribute'=>'evento_idevento',
                'value'=>'eventoIdevento.nombre',
            ],
            'persona_idpersona',

            [
                'attribute'=>'tipo_persona_idtipo_persona',
                'value'=>'tipoPersonaIdtipoPersona.tipo_persona',
            ],

            

            ['class' => 'yii\grid\ActionColumn'],
        ],
        
    ]); ?>

</div>
