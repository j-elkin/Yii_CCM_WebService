<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoArea */

$this->title = 'Create Tipo Area';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
