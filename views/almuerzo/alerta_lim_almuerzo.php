<?php
use kartik\widgets\Alert;

$this->title = 'Dar Almuerzo';
$this->params['breadcrumbs'][] = ['label' => 'Almuerzos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Alert::widget([
            'type' => Alert::TYPE_WARNING,
            'title' => 'Almuerzos consumidos!',
            'icon' => 'glyphicon glyphicon-exclamation-sign',
            'body' => 'La persona con documento N° '.$model->persona_docPersona.'  ya consumio todos los almuerzos.',
            'showSeparator' => true,
            'delay' => false //o numeros P.e. 1000 para un 1sg
        ]);
?>