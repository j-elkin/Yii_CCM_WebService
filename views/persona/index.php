<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'docPersona',
            'nombre',
            'apellidos',
            'genero',
            'fecha_nacimiento',
            // 'correo_electronico',
            // 'telefono',
            // 'codigo_qr',
            // 'tipo_doc_idtipo_doc',
            // 'pais_procedencia_idpais_procedencia',
            // 'institucion_idinstitucion',
            // 'tipo_persona_idtipo_persona',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
