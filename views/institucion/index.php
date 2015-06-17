<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstitucionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institucions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institucion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Institucion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idinstitucion',
            'nombre',
            'pais',
            'ciudad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
