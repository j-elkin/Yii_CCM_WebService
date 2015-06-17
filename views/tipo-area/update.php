<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoArea */

$this->title = 'Update Tipo Area: ' . ' ' . $model->idtipo_area;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtipo_area, 'url' => ['view', 'id' => $model->idtipo_area]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
