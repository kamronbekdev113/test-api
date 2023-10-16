<?php


namespace restapi\controllers;


use common\models\File;
use yii\rest\ActiveController;

class FileController extends MyController
{
    public $modelClass = File::class;
}