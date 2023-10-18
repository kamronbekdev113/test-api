<?php


namespace restapi\models;


use common\models\Stations;

class Station extends Stations
{
    public function fields()
    {
        return [
            "id",
            "address",
            "created_at",
            "deleted_at",
            "email",
            "fax",

            "file_id",
            "lang",
            "lang_hash",
            "lat",
            "long",
            "phone",

            "region_id",
            "status",
            "title",
            "updated_at",
        ];
    }
    public function extraFields()
    {
        return [
            'file'=>function($model){
                /**
                 * @var $model Stations
                 */
                return $model->file;
            },
            "region"=>function($model){
                /**
                 * @var $model Stations
                 */
                return $model->region;
            },
        ];
    }
}