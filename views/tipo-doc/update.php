<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDoc */

$this->title = 'Actualizar Tipo de Documento: ' . ' ' . $model->idtipo_doc;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtipo_doc, 'url' => ['view', 'id' => $model->idtipo_doc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-doc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
