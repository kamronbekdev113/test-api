<?php


namespace restapi\controllers;


use common\models\Stations;
use restapi\models\Station;

class StationController extends MyController
{
    public $modelClass = Station::class;
}