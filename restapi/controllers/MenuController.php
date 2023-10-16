<?php


namespace restapi\controllers;


use common\models\Menus;
use yii\rest\ActiveController;

class MenuController extends  MyController
{
    public $modelClass = \restapi\models\Menus::class;
}