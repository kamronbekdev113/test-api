<?php


namespace restapi\controllers;


use common\models\Stations;
use restapi\models\Station;
use yii\rest\ActiveController;

class StationController extends AccessController
{
    public $modelClass = Station::class;
}