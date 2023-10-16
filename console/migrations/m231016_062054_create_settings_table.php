<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%settings}}`.
 */
class m231016_062054_create_settings_table extends Migration
{
    public function up()
    {
        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp(),
            'alias' => $this->string(),
            'deleted_at' => $this->timestamp(),
            'file_id' => $this->integer(),
            'lang' => $this->integer(),
            'lang_hash' => $this->string(),
            'link' => $this->string(),
            'name' => $this->string(),
            'slug' => $this->string(),
            'sort' => $this->integer(),
            'status' => $this->integer(),
            'updated_at' => $this->timestamp(),
            'value' => $this->string(),
        ]);

        $this->addForeignKey('fk-settings-file', 'settings', 'file_id', 'file', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-settings-file', 'settings');
        $this->dropTable('settings');
    }
}
