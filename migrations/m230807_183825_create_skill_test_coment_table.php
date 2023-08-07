<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skill_test_comment}}`.
 */
class m230807_183825_create_skill_test_coment_table extends Migration
{
    /**Migración para la funcionalidad de comentarios en tests
     * {@inheritdoc}
     */

    public function safeUp(): void
    {
        $this->createTable('{{%test_comment}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'skill_test_id' => $this->integer()->notNull(),
            'content' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk_test_comment_user_id',
            '{{%test_comment}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_test_comment_skill_test_id',
            '{{%test_comment}}',
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
        $this->dropTable('{{%skill_test_comment}}');
    }
}
