<?php


namespace restapi\models;


use common\models\Banners;

class Banner extends Banners
{
    public function fields()
    {
        return [
            'id',
            'created_at',
            'deleted_at',
            'file'=>function($model){
                /**
                 * @var $model Banners
                 */
                return $model->file;
            },
            'file_id',
            'lang',
            'lang_hash',
            'link',
            'sort',
            'status',
            'target',
            'title',
            'updated_at',

        ];
    }
}