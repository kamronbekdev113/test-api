<?php


namespace restapi\controllers;


use common\models\Widgets;
use restapi\models\Widget;
use Yii;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class WidgetController extends MyController
{
    public $modelClass = Widget::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'],$actions['update'],$actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $models = Widget::find()->where(['deleted_at' => null])->all();
        return $models;
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->response->statusCode = 401;
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
                return ['error' => $id."- idli widget yangilanmadi"];
            }
        } else {
            return ['error' => 'Ma\'lumot topilmadi'];
        }
    }

    protected function findModel($id)
    {
        if (($model = Widget::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}