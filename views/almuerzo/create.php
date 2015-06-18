<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Almuerzo */

$this->title = 'Create Almuerzo';
$this->params['breadcrumbs'][] = ['label' => 'Almuerzos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="almuerzo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
