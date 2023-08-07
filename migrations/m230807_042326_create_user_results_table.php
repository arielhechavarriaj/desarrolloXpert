<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_results}}`.
 */
class m230807_042326_create_user_results_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_results}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'test_id' => $this->integer()->notNull(),
            'score' => $this->integer(),
            'results' => $this->text(), // JSON data containing question_id and is_correct
        ]);

        // Add foreign key constraints
        $this->addForeignKey(
            'fk-user_results-user_id',
            '{{%user_results}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-user_results-test_id',
            '{{%user_results}}',
            'test_id',
            '{{%tests}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key constraints first
        $this->dropForeignKey(
            'fk-user_results-user_id',
            '{{%user_results}}'
        );

        $this->dropForeignKey(
            'fk-user_results-test_id',
            '{{%user_results}}'
        );

        $this->dropTable('{{%user_results}}');
    }
}
