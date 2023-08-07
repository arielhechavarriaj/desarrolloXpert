<?php

use yii\db\Migration;

/**
 * Class m230807_040615_seed_question_table
 */
class m230807_040615_seed_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%questions}}', [
            'test_id' => 1, // Assuming test with ID 1 has JavaScript questions
            'text' => 'What is the output of console.log(5 + "5")?',
        ]);

        $this->insert('{{%questions}}', [
            'test_id' => 2, // Assuming test with ID 2 has Python questions
            'text' => 'What is the syntax to define a function in Python?',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230807_040615_seed_question_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230807_040615_seed_question_table cannot be reverted.\n";

        return false;
    }
    */
}
