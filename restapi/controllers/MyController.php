<?php


namespace restapi\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\Response;

class MyController extends ActiveController
{
    public $serializer = [

        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();
//
//        $behaviors['access'] = [
//            'class' => AccessControl::className(),
//            'only' => ['create', 'update', 'delete',],
//            'rules' => [
//                [
//                    'actions' => ['create', 'update', 'delete'],
//                    'allow' => true,
//                    'roles' => ['@'],
//                ],
//
//            ],
//        ];



        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => ['http://mini-crud'],
            ]
        ];

        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;

        $behaviors['formats'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::class,
                HttpBearerAuth::class
            ],
            'except' => [
                'index'
            ]
        ];


        return $behaviors;
    }

}