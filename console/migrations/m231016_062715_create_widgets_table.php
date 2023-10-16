<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%widgets}}`.
 */
class m231016_062715_create_widgets_table extends Migration
{
    public function up()
    {
        $this->createTable('widgets', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(),
            'created_at' => $this->timestamp(),
            'lang' => $this->integer(),
            'lang_hash' => $this->string(),
            'status' => $this->integer(),
            'title' => $this->string(),
            'type' => $this->integer(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    public function down()
    {
        $this->dropTable('widgets');
    }
}
