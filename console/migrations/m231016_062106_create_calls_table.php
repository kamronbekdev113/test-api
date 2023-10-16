<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calls}}`.
 */
class m231016_062106_create_calls_table extends Migration
{
    public function up()
    {
        $this->createTable('calls', [
            'count' => $this->integer(),
            'ball' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('calls');
    }
}
