<?php


namespace restapi\controllers;


use common\models\User;
use restapi\models\LoginForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\rest\Controller;
use yii\web\Response;
use yii\web\ServerErrorHttpException;

class SiteController extends MyController
{

    public $modelClass = \restapi\models\User::class;

    public function actionLogout()
    {
        $user = Yii::$app->user->identity;
        if ($user) {
            $user->access_token = null;
            $user->save();
            Yii::$app->user->logout();
            return ['message' => 'Foydalanuvchi logout qilindi'];
        } else {
            return ['error' => 'Foydalanuvchi topilmadi'];
        }
    }

    public function actionMe()
    {
        $user = new User();
        return Yii::$app->user->identity;
    }


}