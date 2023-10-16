<?php

namespace restapi\controllers;

use Yii;
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
            'class' => \yii\filters\auth\HttpBearerAuth::className(),
        ];

//        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;



        $behaviors['access'] = [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['delete','update'],
            'rules' => [
                [
                    'actions' => ['delete','update'],
                    'allow' => true,
                    'roles' => ['admin'],
                ],
            ],
        ];

        return $behaviors;
    }


    public function actionDelete($id)
    {


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