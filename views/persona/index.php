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
        <?= Html::a('Crear Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'docPersona',
            'nombre',
            'apellidos',
            'asistio',
            'genero',

            'hotel',
            //'fecha_nacimiento',
            //'correo_electronico',
            // 'telefono',
            // 'codigo_qr',
            
            //1. 'tipoDocIdtipoDoc.tipo_documento',//tipoDocIdtipoDoc es la función del modelo Persona.php -> getTipoDocIdtipoDoc() y tipo_documento es el nombre del campo de la tabla (instancia)
            //2. Esto es para activar el cuadro de busqueda. Por ahora sólo realiza busqueda por id
            //3. para quitar la busqueda por ID se modifica las reglas de PersonaSearch.php
            //4. ahora se modifica PersonaSearch.php -> search() para reconocer busqueda por string
            [
                'attribute'=>'tipo_doc_idtipo_doc',
                'value'=>'tipoDocIdtipoDoc.tipo_documento',
            ],
            [
                'attribute'=>'pais_procedencia_idpais_procedencia',
                'value'=>'paisProcedenciaIdpaisProcedencia.nombre',
            ],
            [
                'attribute'=>'institucion_idinstitucion',
                'value'=>'institucionIdinstitucion.nombre',
            ],
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
