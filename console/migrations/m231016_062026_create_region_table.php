<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%region}}`.
 */
class m231016_062026_create_region_table extends Migration
{
    public function up()
    {
        $this->createTable('region', [
            'id' => $this->primaryKey(),
            'code' => $this->integer(),
            'country_id' => $this->integer(),
            'created_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'name_en' => $this->string(),
            'name_oz' => $this->string(),
            'name_ru' => $this->string(),
            'name_uz' => $this->string(),
            'status' => $this->integer(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    public function down()
    {
        $this->dropTable('region');
    }
}
