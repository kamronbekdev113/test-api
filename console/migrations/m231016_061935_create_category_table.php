<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m231016_061935_create_category_table extends Migration
{
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'parent_id' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
