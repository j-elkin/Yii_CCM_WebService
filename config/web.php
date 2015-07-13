<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'CCM_WebService',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),


        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,//Comentado por Elkin
            //'showScriptName' => false,
            'rules' => [ 
                //'<controller>s' => '<controller>/index',
                //'<controller>/<id:\d+>' => '<controller>/view',

                //REGLAS DE URL PARA LA TABLA persona
                'rest/persona/<id:\d+>' => 'rest/persona/view',
                'POST rest/persona/create' => 'rest/persona/create',
                'POST rest/persona/exist' => 'rest/persona/exist',


                'PUT rest/persona/update/<id:\d+>' => 'rest/persona/update',
                //'persona/update/<id:\d+>' => 'persona/update',
                                

                //REGLAs PARA LOS ALMUERZOS
                'POST rest/almuerzo/create' => 'rest/almuerzo/create',
                'POST rest/almuerzo/numeroalmuerzos' => 'rest/almuerzo/numeroalmuerzos',                
                

                //REGLAS DE URL PARA LAS TABLAS DE COMPLETITUD tipo_doc, pais_procedencia, institucion
                'GET rest/tipo-doc' => 'rest/tipo-doc/index',
                'GET rest/pais-procedencia' => 'rest/pais-procedencia/index',
                'GET rest/institucion' => 'rest/institucion/index',

                //REGLAS DE URL PARA LA CONSULTA SQL DE LOS EVENTOS 
                //ASOCIADOS A UN ÁREA Y DIA EN PARTICULAR
                'POST rest/evento/sql' => 'rest/evento/sql',

                //REGLAS DE URL PARA LA TABLA DE COMPLETITUD tipo_area
                'GET rest/tipo-area' => 'rest/tipo-area/index',

                //REGLAS DE URL PARA LA TABLA per_ubic
                'POST rest/persona-ubicacion/create' => 'rest/persona-ubicacion/create',
                'POST rest/persona-ubicacion/remove' => 'rest/persona-ubicacion/remove',
                'POST rest/persona-ubicacion/ubicaciones' => 'rest/persona-ubicacion/ubicaciones',
            ],
        ],


    ], //Cierre $config


    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
