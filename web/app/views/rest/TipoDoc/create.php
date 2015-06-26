<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoDoc */

$this->title = 'Create Tipo Doc';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-doc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
