<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
        'social' => [
            // the module class
            'class' => 'kartik\social\Module',
     
            // the global settings for the disqus widget
            'disqus' => [
                //'settings' => ['shortname' => 'DISQUS_SHORTNAME'] // default settings
                'settings' => ['shortname' => 'DISQUS_SHORTNAME'] // default settings
            ],
     
            // the global settings for the facebook plugins widget
            'facebook' => [
                //'appId' => 'FACEBOOK_APP_ID',
                'appId' => 'https://www.facebook.com/ccm2015',
                //'secret' => 'FACEBOOK_APP_SECRET',
                //'language' => 'es_CO',
                //'type' => FacebookPlugin::FOLLOW,
            ],

            // the global settings for the twitter plugins widget
            'twitter' => [
                'screenName' => 'https://twitter.com/@conmate2015',
                'language' => 'es_CO',
            ],
        ],
        // your other modules
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
];
