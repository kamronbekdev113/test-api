<?php


namespace restapi\controllers;


use common\models\Category;
use yii\rest\ActiveController;

class CategoryController extends AccessController
{
    public $modelClass = Category::class;
}