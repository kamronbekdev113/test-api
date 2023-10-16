<?php


namespace restapi\controllers;


use common\models\Settings;
use yii\rest\ActiveController;

class SettingController extends MyController
{
    public $modelClass = \restapi\models\Settings::class;

}