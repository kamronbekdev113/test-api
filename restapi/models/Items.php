<?php


namespace restapi\models;


class Items extends \common\models\Items
{
    public function fields()
    {
        return [
            "id",
            "created_at",
            "deleted_at",
            "description",
            'file'=>function($model){
                /**
                * @var $model Items
                */
                return $model->file;
            },
            "file_id",
            "parent_id",
            "secondary",
            "sort",
            "status",
            "title",
            "updated_at"
        ];
    }
}