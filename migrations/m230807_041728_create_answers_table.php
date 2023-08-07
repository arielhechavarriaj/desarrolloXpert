<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%answers}}`.
 */
class m230807_041728_create_answers_table extends Migration
{
    public function safeUp(): void
    {
        $this->createTable('{{%answers}}', [
            'id' => $this->primaryKey(),
            'question_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        // Add foreign key constraint
        $this->addForeignKey(
            'fk-answers-question_id',
            '{{%answers}}',
            'question_id',
            '{{%questions}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        // Drop foreign key constraint first
        $this->dropForeignKey(
            'fk-answers-question_id',
            '{{%answers}}'
        );

        $this->dropTable('{{%answers}}');
    }
}
