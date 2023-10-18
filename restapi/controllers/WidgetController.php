<?php


namespace restapi\controllers;


use common\models\Widgets;
use restapi\models\Widget;
use yii\rest\ActiveController;

class WidgetController extends AccessController
{
    public $modelClass = Widget::class;
}