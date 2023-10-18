<?php


namespace restapi\controllers;


use common\models\User;
use restapi\models\LoginForm;
use Yii;
use yii\rest\Controller;
use yii\web\ServerErrorHttpException;

class LoginController extends Controller
{
    public $modelClass = User::class;

    public function actionLogin(){
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post(),'') && ($token = $model->login())){
            return ['token'=>$token];
        }else{
            $errors = $model->getErrors();
            return $errors;
        }
    }

    public function actionSignup()
    {
        $model = new \restapi\models\SignupForm();
        if ($model->load(Yii::$app->request->post(),'')) {
//            return $model->signup();exit();
            if ($model->signup()){
                return ['massage'=>'Yangi user ro`yxatdan o`tdi'];
            }else{
                return $model;
            }
        }else{
            $errors = $model->getErrors();
//            return $model;exit();
            throw new ServerErrorHttpException('Failed to create the object: '.json_encode($errors));

        }
    }

}