<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu_items}}`.
 */
class m231016_062045_create_menu_items_table extends Migration
{
    public function up()
    {
        $this->createTable('menu_items', [
            'id' => $this->primaryKey(),
            'file' => $this->string(),
            'created_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'file_id' => $this->integer(),
            'menu_id' => $this->integer(),
            'menu_item_parent_id' => $this->integer(),
            'sort' => $this->integer(),
            'status' => $this->integer(),
            'title' => $this->string(),
            'updated_at' => $this->timestamp(),
            'url' => $this->string(),
        ]);

        $this->addForeignKey('fk-menu_items-menu', 'menu_items', 'menu_id', 'menus', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-menu_items-menu', 'menu_items');
        $this->dropTable('menu_items');
    }
}
