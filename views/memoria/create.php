<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Memoria */

$this->title = 'Create Memoria';
$this->params['breadcrumbs'][] = ['label' => 'Memorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
