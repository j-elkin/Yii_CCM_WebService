<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Almuerzo */

$this->title = 'Actualizar Almuerzo: ' . ' ' . $model->idAlmuerzo;
$this->params['breadcrumbs'][] = ['label' => 'Almuerzos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAlmuerzo, 'url' => ['view', 'id' => $model->idAlmuerzo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="almuerzo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
