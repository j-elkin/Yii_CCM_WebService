<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ccm */

$this->title = 'Create Ccm';
$this->params['breadcrumbs'][] = ['label' => 'Ccms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ccm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
