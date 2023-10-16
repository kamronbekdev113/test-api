<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stations}}`.
 */
class m231016_062705_create_stations_table extends Migration
{
    public function up()
    {
        $this->createTable('stations', [
            'id' => $this->primaryKey(),
            'address' => $this->string(),
            'created_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'email' => $this->string(),
            'fax' => $this->string(),
            'file_id' => $this->integer(),
            'lang' => $this->integer(),
            'lang_hash' => $this->string(),
            'lat' => $this->string(),
            'long' => $this->string(),
            'phone' => $this->string(),
            'region_id' => $this->integer(),
            'status' => $this->integer(),
            'title' => $this->string(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->addForeignKey('fk-stations-file', 'stations', 'file_id', 'file', 'id', 'CASCADE');
        $this->addForeignKey('fk-stations-region', 'stations', 'region_id', 'region', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-stations-file', 'stations');
        $this->dropForeignKey('fk-stations-region', 'stations');

        $this->dropTable('stations');
    }
}
