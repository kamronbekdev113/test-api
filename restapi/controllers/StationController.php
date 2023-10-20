<?php


namespace restapi\controllers;


use common\models\Stations;
use restapi\models\Station;
use Yii;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class StationController extends MyController
{
    public $modelClass = Station::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'],$actions['update'],$actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $models = Station::find()->where(['deleted_at' => null])->all();
        return $models;
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->response->statusCode = 401; // Unauthorized
            return ['error' => 'Authentication required.'];
        }else{
            $model = $this->findModel($id);
            $model->deleted_at = date('Y-m-d H:i:s');
            $model->save();
            return ['status' => 'success', 'message' => 'The record has been soft-deleted.'];
        }


    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);




        if ($model->load($this->request->post(),'')) {
            $model->load(Yii::$app->request->getBodyParams(), '');
            if ($model->save()) {
                return $model;
            } else {
                return ['error' => 'Ma\'lumotni yangilashda xato'];
            }
        } else {
            return ['error' => 'Ma\'lumot topilmadi'];
        }
    }

    protected function findModel($id)
    {
        if (($model = Station::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}