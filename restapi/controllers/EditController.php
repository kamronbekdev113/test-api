<?php

namespace restapi\controllers;

use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class EditController extends Controller
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::class,
                HttpBearerAuth::class
            ],
        ];

//        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;



        $behaviors['access'] = [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['delete','update'],
            'rules' => [
                [
                    'actions' => ['delete','update'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];

        return $behaviors;
    }


    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->response->statusCode = 401; // Unauthorized
            return ['error' => 'Authentication required.'];
        }


        $model = $this->findModel($id);
        if ($model) {
            $model->delete();
            Yii::$app->response->format = Response::FORMAT_JSON;
            $response = Yii::$app->response->statusCode = 200;
            return ['message' => "Malumot o'chirildi"];
        } else {
            throw new NotFoundHttpException('Malumot topilmadi');
        }
    }


    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->response->statusCode = 401; // Unauthorized
            return ['error' => 'Authentication required.'];
        }

        $model = $this->findModel($id);
        if ($model) {
            $model->load(Yii::$app->request->getBodyParams(), '');
            if ($model->save()) {
                return $model;
            } else {
                return ['error' => 'Ma\'lumotni yangilashda xato'];
            }
        } else {
            return ['error' => 'Ma\'lumot topilmadi'];
        }
    }

}