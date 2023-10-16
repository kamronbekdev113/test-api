<?php


namespace restapi\controllers;


use common\models\User;
use restapi\models\LoginForm;
use yii\rest\Controller;

class LoginController extends Controller
{
    public $modelClass = User::class;

    public function actionLogin(){
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post(),'') && ($token = $model->login())){
            return ['token'=>$token];
        }else{
            return \Error::class;
        }
    }

}