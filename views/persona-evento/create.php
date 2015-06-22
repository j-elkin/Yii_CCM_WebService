<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PersonaEvento */

$this->title = 'Inscribir Persona a Evento';
$this->params['breadcrumbs'][] = ['label' => 'Persona Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-evento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
