<?php


namespace restapi\controllers;


use common\models\MenuItems;
use yii\rest\ActiveController;

class MenuItemsController extends MyController
{
    public $modelClass = MenuItems::class;
}