<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaEventoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Persona Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-evento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Persona Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'evento_idevento',
            'persona_idpersona',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>