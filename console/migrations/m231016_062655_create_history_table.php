<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history}}`.
 */
class m231016_062655_create_history_table extends Migration
{
    public function up()
    {
        $this->createTable('history', [
            'id' => $this->primaryKey(),
            'anons' => $this->string(),
            'content' => $this->string(),
            'created_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'description' => $this->string(),
            'documents' => $this->string(),
            'file_id' => $this->integer(),
            'lang' => $this->integer(),
            'lang_hash' => $this->string(),
            'slug' => $this->string(),
            'status' => $this->integer(),
            'title' => $this->string(),
            'type' => $this->integer(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('fk-history-file', 'history', 'file_id', 'file', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-history-file', 'history');

        $this->dropTable('history');
    }
}
