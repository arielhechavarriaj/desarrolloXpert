<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%identity_providers}}`.
 */
class m230807_042628_create_identity_providers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%identity_providers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%identity_providers}}');
    }
}
