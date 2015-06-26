<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoDocSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Docs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-doc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo Doc', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtipo_doc',
            'tipo_documento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
