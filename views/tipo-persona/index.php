<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoPersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Tipo de Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtipo_persona',
            'tipo_persona',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
