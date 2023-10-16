<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banners}}`.
 */
class m231016_062131_create_banners_table extends Migration
{
    public function up()
    {
        $this->createTable('banners', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'file_id' => $this->integer(),
            'lang' => $this->integer(),
            'lang_hash' => $this->string(),
            'link' => $this->string(),
            'sort' => $this->integer(),
            'status' => $this->integer(),
            'target' => $this->integer(),
            'title' => $this->string(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('fk-banners-file', 'banners', 'file_id', 'file', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-banners-file', 'banners');

        $this->dropTable('banners');
    }
}
