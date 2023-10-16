<?php


namespace restapi\controllers;


use common\models\Posts;
use restapi\models\Post;

class PostController extends MyController
{
    public $modelClass = Post::class;
}