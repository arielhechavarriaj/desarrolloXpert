<?php

use yii\db\Migration;

/**
 * Class m230807_041738_seed_answers_table
 */
class m230807_041738_seed_answers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%answers}}', [
            'question_id' => 1, // Assuming question with ID 1 has answer options
            'text' => '55',
             ]);

        $this->insert('{{%answers}}', [
            'question_id' => 1, // Assuming question with ID 1 has answer options
            'text' => '10',
        ]);

        $this->insert('{{%answers}}', [
            'question_id' => 2, // Assuming question with ID 2 has answer options
            'text' => 'def my_function():'
        ]);

        $this->insert('{{%answers}}', [
            'question_id' => 2, // Assuming question with ID 2 has answer options
            'text' => 'function my_function():'
        ]);

        $this->insert('{{%answers}}', [
            'question_id' => 2, // Assuming question with ID 2 has answer options
            'text' => 'def my_function:'
        ]);

        // Add more seed data as needed
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230807_041738_seed_answers_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230807_041738_seed_answers_table cannot be reverted.\n";

        return false;
    }
    */
}
