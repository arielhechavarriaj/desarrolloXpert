<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skill_test_question_answer}}`.
 */
class m230807_170050_create_skill_test_question_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%skill_test_question_answer}}', [
            'skill_test_id' => $this->integer()->notNull(),
            'question_answer_id' => $this->integer()->notNull(),
        ]);

        // Agregando FK para las preguntas de los tests
        $this->addForeignKey(
            'fk_skill_test_question_answer_skill_test_id',
            '{{%skill_test_question_answer}}',
            'skill_test_id',
            '{{%skill_test}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_skill_test_question_answer_question_answer_id',
            '{{%skill_test_question_answer}}',
            'question_answer_id',
            '{{%question_answer}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%skill_test_question_answer}}');
    }
}
