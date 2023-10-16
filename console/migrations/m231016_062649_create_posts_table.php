<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts}}`.
 */
class m231016_062649_create_posts_table extends Migration
{
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'content' => $this->string(),
            'created_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'description' => $this->string(),
            'documents' => $this->string(),
            'file_id' => $this->integer(),
            'lang' => $this->integer(),
            'lang_hash' => $this->string(),
            'photo_author' => $this->integer(),
            'popular' => $this->integer(),
            'published_at' => $this->timestamp(),
            'slug' => $this->string(),
            'status' => $this->integer(),
            'title' => $this->string(),
            'top' => $this->integer(),
            'type' => $this->integer(),
            'updated_at' => $this->timestamp(),
            'video' => $this->string(),
        ]);

        $this->addForeignKey('fk-posts-file', 'posts', 'file_id', 'file', 'id', 'CASCADE');
        $this->addForeignKey('fk-posts-category', 'posts', 'category_id', 'category', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-posts-file', 'posts');
        $this->dropForeignKey('fk-posts-category', 'posts');

        $this->dropTable('posts');
    }
}
