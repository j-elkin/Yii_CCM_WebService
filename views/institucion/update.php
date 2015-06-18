<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Institucion */

$this->title = 'Actualizar Institución: ' . ' ' . $model->idinstitucion;
$this->params['breadcrumbs'][] = ['label' => 'Institucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idinstitucion, 'url' => ['view', 'id' => $model->idinstitucion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="institucion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
