<?php


namespace restapi\models;


class Menus extends \common\models\Menus
{
    public function fields()
    {
        return [
            "id",
            "alias",
            "deleted_at",
            "created_at",
            'menu_items'=>function($model){
                /**
                 * @var $model Menus
                 */
                return $model->menuItems;
            },
            "lang",
            "lang_hash",
            "status",
            "title",
            "translations",
            "type",
            "updated_at",

        ];
    }
}