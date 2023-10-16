<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%file}}`.
 */
class m231016_062019_create_file_table extends Migration
{
    public function up()
    {
        $this->createTable('file', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp(),
            'description' => $this->string(),
            'domain' => $this->string(),
            'ext' => $this->string(),
            'file' => $this->string(),
            'folder' => $this->string(),
            'folder_id' => $this->integer(),
            'path' => $this->string(),
            'size' => $this->float(),
            'slug' => $this->string(),
            'thumbnails' => $this->json(),
            'title' => $this->string(),
            'updated_at' => $this->timestamp(),
            'user_id' => $this->integer(),
        ]);
        $this->addForeignKey('fk-file-user', 'file', 'user_id', 'user', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-file-user', 'file');

        $this->dropTable('file');
    }
}
