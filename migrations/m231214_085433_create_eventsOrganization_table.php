<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%eventsOrganization}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%events}}`
 * - `{{%organization}}`
 */
class m231214_085433_create_eventsOrganization_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%eventsOrganization}}', [
            'id' => $this->primaryKey(),
            'events_id' => $this->integer()->notNull(),
            'organization_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `events_id`
        $this->createIndex(
            '{{%idx-eventsOrganization-events_id}}',
            '{{%eventsOrganization}}',
            'events_id'
        );

        // add foreign key for table `{{%events}}`
        $this->addForeignKey(
            '{{%fk-eventsOrganization-events_id}}',
            '{{%eventsOrganization}}',
            'events_id',
            '{{%events}}',
            'id',
            'CASCADE'
        );

        // creates index for column `organization_id`
        $this->createIndex(
            '{{%idx-eventsOrganization-organization_id}}',
            '{{%eventsOrganization}}',
            'organization_id'
        );

        // add foreign key for table `{{%organization}}`
        $this->addForeignKey(
            '{{%fk-eventsOrganization-organization_id}}',
            '{{%eventsOrganization}}',
            'organization_id',
            '{{%organization}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%events}}`
        $this->dropForeignKey(
            '{{%fk-eventsOrganization-events_id}}',
            '{{%eventsOrganization}}'
        );

        // drops index for column `events_id`
        $this->dropIndex(
            '{{%idx-eventsOrganization-events_id}}',
            '{{%eventsOrganization}}'
        );

        // drops foreign key for table `{{%organization}}`
        $this->dropForeignKey(
            '{{%fk-eventsOrganization-organization_id}}',
            '{{%eventsOrganization}}'
        );

        // drops index for column `organization_id`
        $this->dropIndex(
            '{{%idx-eventsOrganization-organization_id}}',
            '{{%eventsOrganization}}'
        );

        $this->dropTable('{{%eventsOrganization}}');
    }
}
