<?php
use kartik\widgets\Alert;

$this->title = 'Inscribir persona';
$this->params['breadcrumbs'][] = ['label' => 'Inscripciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Alert::widget([
            'type' => Alert::TYPE_WARNING,
            'title' => 'No hay cupos disponibles!',
            'icon' => 'glyphicon glyphicon-exclamation-sign',
            'body' => 'Este evento no cuenta con cupos disponibles.',
            'showSeparator' => true,
            'delay' => false //o numeros P.e. 1000 para un 1sg
        ]);
?>