<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%items}}`.
 */
class m231016_062724_create_items_table extends Migration
{
    public function up()
    {
        $this->createTable('items', [
            'id' => $this->primaryKey(),
            'created_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'description' => $this->string(),
            'file_id' => $this->integer(),
            'parent_id' => $this->integer(),
            'secondary' => $this->string(),
            'sort' => $this->integer(),
            'status' => $this->integer(),
            'title' => $this->string(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('fk-items-file', 'items', 'file_id', 'file', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-items-file', 'items');

        $this->dropTable('items');
    }
}
