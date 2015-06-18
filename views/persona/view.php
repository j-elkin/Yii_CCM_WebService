<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->docPersona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->docPersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->docPersona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'docPersona',
            'nombre',
            'apellidos',
            'genero',
            'fecha_nacimiento',
            'correo_electronico',
            'telefono',
            'codigo_qr',
            'tipo_doc_idtipo_doc',
            'pais_procedencia_idpais_procedencia',
            'institucion_idinstitucion',
            'tipo_persona_idtipo_persona',
        ],
    ]) ?>

</div>
