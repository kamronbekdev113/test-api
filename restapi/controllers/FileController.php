<?php


namespace restapi\controllers;

use yii\rest\ActiveController;
use yii\web\UploadedFile;
use common\models\File;
use Yii;

class FileController extends AccessController
{
    public $modelClass = 'common\models\File';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']); // File modelni ro'yxatini olish uchun index ni o'chiramiz
        return $actions;
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