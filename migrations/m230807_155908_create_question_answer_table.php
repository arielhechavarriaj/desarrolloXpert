<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question_answer}}`.
 */
class m230807_155908_create_question_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp(): void
    {
        $this->createTable('{{%question_answer}}', [
            'id' => $this->primaryKey(),
            'question' => $this->text()->notNull(),
            'code' => $this->text(),
            'skill_category_id' => $this->integer()->notNull(), // Cambio: Cambiar a integer
            'type' => $this->string(50)->notNull(),
            'options' => $this->json(),
            'correct_option' => $this->json(),
        ]);

        // Agregando FK para la categoría de habilidad
        $this->addForeignKey(
            'fk_question_answer_skill_category_id',
            '{{%question_answer}}',
            'skill_category_id',
            '{{%skill_category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%question_answer}}');
    }
}
