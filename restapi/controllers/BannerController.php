<?php


namespace restapi\controllers;


use common\models\Banners;
use restapi\models\Banner;
use yii\rest\ActiveController;

class BannerController extends AccessController
{
    public $modelClass = Banner::class;
}