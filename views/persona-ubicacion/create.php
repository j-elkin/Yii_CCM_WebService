<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PersonaUbicacion */

$this->title = 'Inscribir persona';
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-ubicacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
