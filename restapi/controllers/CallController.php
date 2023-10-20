<?php


namespace restapi\controllers;


use common\models\Calls;
use yii\rest\ActiveController;

class CallController extends MyController
{
    public $modelClass = Calls::class;
}