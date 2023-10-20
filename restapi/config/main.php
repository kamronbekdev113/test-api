<?php

use yii\filters\AccessControl;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-restapi',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'restapi\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'response' => [
            'class' => 'yii\web\Response',
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
            'loginUrl' =>null ,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],


        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                'login' => 'login/login',
                'me'=>'site/me',
                'register'=>'login/signup',
                'logout'=>'site/logout',
                'DELETE <controller>/<id:\d+>' => '<controller>/delete',
                'PUT <controller>/<id:\d+>' => '<controller>/update',
                'POST <controller>/'=>'<controller>/create',

                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'user',
                        'menu',
                        'setting',
                        'menu-items',
                        'file',
                        'call',
                        'useful-link',
                        'banner',
                        'post',
                        'station',
                        'widget',
                        'item',
                        'category'
                    ],
                    'pluralize' => false,
                ],
            ],
        ]

    ],

    'params' => $params,
];
