<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 */
class m230807_040605_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%questions}}', [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
        ]);

        // Add foreign key constraint
        $this->addForeignKey(
            'fk-questions-test_id',
            '{{%questions}}',
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
        $this->dropForeignKey(
            'fk-questions-test_id',
            '{{%questions}}'
        );

        $this->dropTable('{{%questions}}');
    }
}
