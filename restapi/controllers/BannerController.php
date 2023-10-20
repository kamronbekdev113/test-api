<?php


namespace restapi\controllers;


use common\models\Banners;
use common\models\User;
use restapi\models\Banner;
use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class BannerController extends MyController
{

    public $modelClass = Banner::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'],$actions['update'],$actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $models = Banner::find()->where(['deleted_at' => null])->all();
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
            return ['status' => 'success', 'message' => 'Muvaffaqqiyatli o`chirildi'];
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
        if (($model = Banner::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}