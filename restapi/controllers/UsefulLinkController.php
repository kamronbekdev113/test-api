<?php


namespace restapi\controllers;


use common\models\UsefulLinks;
use restapi\models\UsefulLink;
use yii\rest\ActiveController;

class UsefulLinkController extends AccessController
{
    public $modelClass = UsefulLink::class;

}