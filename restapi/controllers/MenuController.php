<?php


namespace restapi\controllers;


use common\models\Menus;
use yii\filters\AccessControl;
use yii\rest\ActiveController;

class MenuController extends  ActiveController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete'],
                        'roles' => ['@'], // @ means authenticated user
                    ],
                ],
            ],
        ];
    }

    public $modelClass = \restapi\models\Menus::class;
}