<?php


namespace restapi\controllers;


use common\models\Banners;
use restapi\models\Banner;

class BannerController extends MyController
{
    public $modelClass = Banner::class;
}