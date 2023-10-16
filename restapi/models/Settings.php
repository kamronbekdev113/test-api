<?php


namespace restapi\models;


class Settings extends  \common\models\Settings
{
    public function fields()
    {
        return [
            'id',
            'created_at',
            'alias',
            'deleted_at',
            'file'=>function($model){
                /**
                 * @var $model Settings
                 */
                return $model->file;
            },
            'file_id',
            'lang',
            'lang_hash',
            'link',
            'name',
            'slug',
            'sort',
            'status',
            'updated_at',
            'value',
        ];
    }
}