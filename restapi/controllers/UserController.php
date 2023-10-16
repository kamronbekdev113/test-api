<?php
namespace restapi\controllers;

use restapi\models\User;
use yii\rest\ActiveController;


class UserController extends MyController
{
    public $modelClass = User::class;

}