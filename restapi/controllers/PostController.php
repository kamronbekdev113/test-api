<?php


namespace restapi\controllers;


use common\models\Posts;
use restapi\models\Post;
use yii\rest\ActiveController;

class PostController extends AccessController
{
    public $modelClass = Post::class;
}