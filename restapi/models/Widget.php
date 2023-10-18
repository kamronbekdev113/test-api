<?php


namespace restapi\models;


use common\models\Widgets;

class Widget extends Widgets
{
    public function fields()
    {
        return [
            "id",
            "alias",
            "created_at",

            "lang",
            "lang_hash",
            "status",
            "title",
            "type",
            "updated_at"
        ];
    }

    public function extraFields()
    {
        return [
            'items'=>function($model){
                /**
                 * @var $model Widgets
                 */
                return $model->items;
            },
        ];
    }
}