<?php


namespace restapi\models;


use common\models\Category;
use common\models\Posts;

class Post extends Posts
{
    public function fields()
    {
        return [
            "id",
            "category_id"=>function($model){
                /**
                 * @var $model Posts
                 */
                return $model->category;
            },
            "content",
            "created_at",
            "deleted_at",
            "description",
            "documents",
            'file'=>function($model){
                /**
                 * @var $model Posts
                 */
                return $model->file;
            },
            "file_id",
            "lang",
            "lang_hash",
            "photo_author",
            "popular",
            "published_at",
            "slug",
            "status",
            "title",
            "top",
            "type",
            "updated_at",
            "video",
        ];
    }
}