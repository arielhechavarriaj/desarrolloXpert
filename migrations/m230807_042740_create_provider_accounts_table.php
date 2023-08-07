<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%provider_accounts}}`.
 */
class m230807_042740_create_provider_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%provider_accounts}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'identity_provider_id' => $this->integer()->notNull(),
            'identifier' => $this->string()->notNull(),
        ]);

        // Add foreign key constraints
        $this->addForeignKey(
            'fk-provider_accounts-user_id',
            '{{%provider_accounts}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-provider_accounts-identity_provider_id',
            '{{%provider_accounts}}',
            'identity_provider_id',
            '{{%identity_providers}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key constraints first
        $this->dropForeignKey(
            'fk-provider_accounts-user_id',
            '{{%provider_accounts}}'
        );

        $this->dropForeignKey(
            'fk-provider_accounts-identity_provider_id',
            '{{%provider_accounts}}'
        );

        $this->dropTable('{{%provider_accounts}}');
    }
}
