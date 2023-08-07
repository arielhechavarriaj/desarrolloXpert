<?php

use yii\db\Migration;

/**
 * Class m230807_040154_seed_test_table
 */
class m230807_040154_seed_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%tests}}', [
            'test_type_id' => 1, // Assuming test type with ID 1 is JavaScript
            'name' => 'JavaScript Basics Test',
            'description' => 'Test to assess basic JavaScript knowledge.',
            'duration' => 1800, // 30 minutes
            'total_questions' => 20,
        ]);

        $this->insert('{{%tests}}', [
            'test_type_id' => 2, // Assuming test type with ID 2 is Python
            'name' => 'Python Fundamentals Test',
            'description' => 'Test to evaluate fundamental Python skills.',
            'duration' => 2400, // 40 minutes
            'total_questions' => 25,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230807_040154_seed_test_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230807_040154_seed_test_table cannot be reverted.\n";

        return false;
    }
    */
}
