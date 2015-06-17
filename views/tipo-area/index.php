<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoAreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Areas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-area-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo Area', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtipo_area',
            'tipo_area',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
