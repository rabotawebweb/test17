<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%events}}`.
 */
class m231214_083358_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%events}}', [
            'id' => $this->primaryKey(),
			'title' => $this->string()->notNull(),
			'date' => $this->string(),
			'body' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%events}}');
    }
}
