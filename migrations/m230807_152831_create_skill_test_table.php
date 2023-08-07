<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skill_test}}`.
 */
class m230807_152831_create_skill_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
           $this->createTable('{{%skill_test}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'description' => $this->text(),
            'skill_category_id' => $this->integer()->notNull(),
            'duration_time_by_question' => $this->integer()->notNull(),

        ]);

        // Agregando FK para las categorias de los tests (E.j Angular,Java,PHP)
        $this->addForeignKey(
            'fk_skill_test_skill_category_id',
            '{{%skill_test}}',
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
        $this->dropTable('{{%skill_test}}');
    }
}
