<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test}}`.
 */
class m230807_040002_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tests}}', [
            'id' => $this->primaryKey(),
            'test_type_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'duration' => $this->integer()->notNull(),
            'total_questions' => $this->integer()->notNull(),
        ]);

        // Add foreign key constraint
        $this->addForeignKey(
            'fk-tests-test_type_id',
            '{{%tests}}',
            'test_type_id',
            '{{%test_types}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key constraint first
        $this->dropForeignKey(
            'fk-tests-test_type_id',
            '{{%tests}}'
        );

        $this->dropTable('{{%tests}}');
    }
}
