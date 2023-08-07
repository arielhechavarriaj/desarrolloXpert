<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_result}}`.
 */
class m230807_180219_create_user_result_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%user_result}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'skill_test_id' => $this->integer()->notNull(),
            'score' => $this->integer()->notNull(),
                    ]);

        $this->addForeignKey(
            'fk_user_result_user_id',
            '{{%user_result}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_user_result_skill_test_id',
            '{{%user_result}}',
            'skill_test_id',
            '{{%skill_test}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%user_result}}');
    }
}
