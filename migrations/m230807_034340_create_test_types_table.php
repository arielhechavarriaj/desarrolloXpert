<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_types}}`.
 */
class m230807_034340_create_test_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_types}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test_types}}');
    }
}
