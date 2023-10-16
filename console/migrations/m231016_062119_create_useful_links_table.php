<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%useful_links}}`.
 */
class m231016_062119_create_useful_links_table extends Migration
{
    public function up()
    {
        $this->createTable('useful_links', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'file_id' => $this->integer(),
            'lang' => $this->integer(),
            'lang_hash' => $this->string(),
            'link' => $this->string(),
            'name_en' => $this->string(),
            'name_oz' => $this->string(),
            'name_ru' => $this->string(),
            'name_uz' => $this->string(),
            'sort' => $this->integer(),
            'status' => $this->integer(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('fk-useful_links-file', 'useful_links', 'file_id', 'file', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-useful_links-file', 'useful_links');

        $this->dropTable('useful_links');
    }
}
