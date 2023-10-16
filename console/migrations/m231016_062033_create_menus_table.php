<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menus}}`.
 */
class m231016_062033_create_menus_table extends Migration
{
    public function up()
    {
        $this->createTable('menus', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(255),
            'deleted_at' => $this->timestamp(),
            'created_at' => $this->timestamp(),
            'lang' => $this->integer(),
            'lang_hash' => $this->string(),
            'status' => $this->integer(),
            'title' => $this->string(),
            'translations' => 'JSON', // JSON ma'lumotlar turi
            'type' => $this->string(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    public function down()
    {
        $this->dropTable('menus');
    }
}
