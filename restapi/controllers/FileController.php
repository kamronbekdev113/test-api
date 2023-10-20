<?php


namespace restapi\controllers;

use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use common\models\File;
use Yii;

class FileController extends MyController
{
    public $modelClass = 'common\models\File';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'],$actions['update'],$actions['index'],$actions['create']);
        return $actions;
    }

    public function actionIndex()
    {
        $models = File::find()->where(['deleted_at' => null])->all();
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
        if (($model = File::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreate()
    {

        if (Yii::$app->user->isGuest) {
            Yii::$app->response->statusCode = 401; // Unauthorized
            return ['error' => 'Authentication required.'];
        }

        $model = new File();

        if (Yii::$app->request->isPost) {

            $file = UploadedFile::getInstanceByName('file');

            if (!$file) {
                Yii::$app->response->setStatusCode(400);
                return ['status' => 'error', 'data' => 'No file was uploaded.'];
            }

            $model->file = $file->baseName;
            $model->ext = $file->extension;
            $model->size = $file->size;
            $model->domain = 'cdn.tpp-test';
            $model->user_id = $model->user->id;
            $model->path = 'uploads/' . $model->file .".". $model->ext;
//            print_r(__DIR__."/../../static" . '/uploads/' . $model->file . "." . $model->ext);exit();
            if ($file->saveAs(__DIR__."/../../static" . '/uploads/' . $model->file . "." . $model->ext)) {
                if ($model->save()) {
                    Yii::$app->response->setStatusCode(201);
                    return ['status' => 'success', 'data' => 'File uploaded successfully.'];
                }
            }
        }

        Yii::$app->response->setStatusCode(400);
        return ['status' => 'error', 'data' => 'File upload failed.'];
    }

}