<?php


namespace restapi\models;


use common\models\UsefulLinks;

class UsefulLink extends UsefulLinks
{
    public function fields()
    {
        return [
            "id",
            "created_at",
            "deleted_at",

            "file_id",
            "lang",
            "lang_hash",
            "link",
            "name_en",
            "name_oz",
            "name_ru",
            "name_uz",
            "sort",
            "status",
            "updated_at",

        ];
    }
    public function extraFields()
    {
        return [
            'file'=>function($model){
                /**
                 * @var $model UsefulLinks
                 */
                return $model->file;
            },
        ];
    }
}