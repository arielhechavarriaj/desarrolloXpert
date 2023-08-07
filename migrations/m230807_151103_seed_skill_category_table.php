<?php

use yii\db\Migration;

/**
 * Class m230807_151103_seed_skill_category_table
 */
class m230807_151103_seed_skill_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $categories = [
            'Angular',
            'PHP',
            'JavaScript',
            'HTML',
            'CSS',
            'Python',
            'Ruby',
            'Java',
            'C#',
            'SQL',
        ];

        foreach ($categories as $category) {
            $this->insert('{{%skill_category}}', [
                'name' => $category,
            ]);
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230807_151103_seed_skill_category_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230807_151103_seed_skill_category_table cannot be reverted.\n";

        return false;
    }
    */
}
