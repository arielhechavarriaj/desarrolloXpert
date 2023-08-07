<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ranking}}`.
 */
class m230807_181607_create_ranking_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ranking}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'skill_test_id' => $this->integer()->notNull(),
            'score' => $this->integer()->notNull(),
            'rank' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_test_score_user_id',
            '{{%ranking}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_test_score_skill_test_id',
            '{{%ranking}}',
            'skill_test_id',
            '{{%skill_test}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ranking}}');
    }
}
