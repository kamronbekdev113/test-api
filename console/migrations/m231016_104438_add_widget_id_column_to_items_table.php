<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%items}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%widgets}}`
 */
class m231016_104438_add_widget_id_column_to_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%items}}', 'widget_id', $this->integer());

        // creates index for column `widget_id`
        $this->createIndex(
            '{{%idx-items-widget_id}}',
            '{{%items}}',
            'widget_id'
        );

        // add foreign key for table `{{%widgets}}`
        $this->addForeignKey(
            '{{%fk-items-widget_id}}',
            '{{%items}}',
            'widget_id',
            '{{%widgets}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%widgets}}`
        $this->dropForeignKey(
            '{{%fk-items-widget_id}}',
            '{{%items}}'
        );

        // drops index for column `widget_id`
        $this->dropIndex(
            '{{%idx-items-widget_id}}',
            '{{%items}}'
        );

        $this->dropColumn('{{%items}}', 'widget_id');
    }
}
