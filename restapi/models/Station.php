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
            'file'=>function($model){
                /**
                 * @var $model Stations
                 */
                return $model->file;
            },
            "file_id",
            "lang",
            "lang_hash",
            "lat",
            "long",
            "phone",
            "region"=>function($model){
                /**
                 * @var $model Stations
                 */
                return $model->region;
            },
            "region_id",
            "status",
            "title",
            "updated_at",
        ];
    }
}