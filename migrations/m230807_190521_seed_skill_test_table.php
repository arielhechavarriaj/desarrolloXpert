<?php

use yii\db\Migration;

/**
 * Class m230807_190521_seed_skill_test_table
 */
class m230807_190521_seed_skill_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {

        $this->insert('{{%skill_test}}', [
            'name' => 'Angular Basics',
            'description' => 'Test your knowledge of Angular fundamentals.',
            'skill_category_id' => 1, // ID de la categoría Angular
            'duration_time_by_question' => 120,

        ]);

        $angularTestId = $this->db->getLastInsertID();

        $angularQuestions = $this->db->createCommand('SELECT id FROM {{%question_answer}} WHERE skill_category_id = :category_id')
            ->bindValue(':category_id', 1) // ID de la categoría Angular
            ->queryColumn();

        foreach ($angularQuestions as $questionId) {
            $this->insert('{{%skill_test_question_answer}}', [
                'skill_test_id' => $angularTestId,
                'question_answer_id' => $questionId,
            ]);
        }


    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230807_190521_seed_skill_test_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230807_190521_seed_skill_test_table cannot be reverted.\n";

        return false;
    }
    */
}
