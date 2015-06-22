<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ccm */

$this->title = 'Actualizar CCM: ' . ' ' . $model->idCCM;
$this->params['breadcrumbs'][] = ['label' => 'Ccms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCCM, 'url' => ['view', 'id' => $model->idCCM]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ccm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
