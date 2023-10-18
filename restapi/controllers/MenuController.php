<?php


namespace restapi\controllers;


use common\models\Menus;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\rest\ActiveController;

class MenuController extends  AccessController
{
    public $modelClass = \restapi\models\Menus::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function actionIndex()
    {
        $query = Menus::find();
        $dataProvider = new ActiveDataProvider([
            'query'=> $query,
            'pagination'=>[
                'pageSize'=> 2
            ]
        ]);

        return $dataProvider;
    }
}