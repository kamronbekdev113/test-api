<?php
namespace restapi\controllers;

use restapi\models\SignupForm;
use restapi\models\User;
use Yii;
use yii\rest\ActiveController;
use yii\web\ErrorHandler;
use yii\web\ServerErrorHttpException;
//use yii\web\ServerErrorHttpException as ServerErrorHttpExceptionAlias;


class UserController extends MyController
{
    public $modelClass = \restapi\models\User::class;


}


