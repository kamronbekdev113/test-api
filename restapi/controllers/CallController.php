<?php


namespace restapi\controllers;


use common\models\Calls;
use yii\rest\ActiveController;

class CallController extends AccessController
{
    public $modelClass = Calls::class;
}