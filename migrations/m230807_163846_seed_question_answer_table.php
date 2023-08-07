<?php

use yii\db\Migration;

/**
 * Class m230807_163846_seed_question_answer_table
 */
class m230807_163846_seed_question_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        // Seeding for Angular question
        $this->insert('{{%question_answer}}', [
            'question' => 'Seleccione cuáles son las directivas estructurales de Angular.',
            'code' => '/* Angular code snippet here */',
            'type' => 'multiple_choice',
            'options' => json_encode([
                'ng-if',
                'ng-for',
                'ng-switch',
                'ng-choose',
            ]),
            'correct_option' => json_encode([1, 2]),
            'skill_category_id' => 1, // ID de la categoría Angular
        ]);
        // Seeding for PHP question
        $this->insert('{{%question_answer}}', [
            'question' => '¿Cuál es el resultado de la expresión (5 + 3) / 2 en PHP?',
            'type' => 'boolean',
            'options' => json_encode([
                '15',
                '0',
                'Ninguna',
            ]),
            'correct_option' => json_encode(1),
            'skill_category_id' => 2, // ID de la categoría PHP
        ]);
        // Seeding for JavaScript question
        $this->insert('{{%question_answer}}', [
            'question' => 'Escribe una función en JavaScript para sumar dos números.',
            'type' => 'code',
            'code' => 'function sum(a, b) {
                return a + b;
            }',
            'skill_category_id' => 3, // ID de la categoría JS
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230807_163846_seed_question_answer_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230807_163846_seed_question_answer_table cannot be reverted.\n";

        return false;
    }
    */
}
