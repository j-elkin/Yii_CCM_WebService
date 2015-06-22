<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\PersonaEvento */

$this->title = $model->evento_idevento;
$this->params['breadcrumbs'][] = ['label' => 'Persona Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-evento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'evento_idevento' => $model->evento_idevento, 'persona_idpersona' => $model->persona_idpersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'evento_idevento' => $model->evento_idevento, 'persona_idpersona' => $model->persona_idpersona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Realmente quiere borra esta inscripción?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'evento_idevento',
            'eventoIdevento.nombre',
            //'persona_idpersona',
            'personaIdpersona.documentoNombre',
        ],
    ]) ?>

</div>
