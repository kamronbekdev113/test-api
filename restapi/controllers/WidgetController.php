<?php


namespace restapi\controllers;


use common\models\Widgets;
use restapi\models\Widget;

class WidgetController extends MyController
{
    public $modelClass = Widget::class;
}