<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skill_category}}`.
 */
class m230807_145830_create_skill_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%skill_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%skill_category}}');
    }
}
