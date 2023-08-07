<?php

use yii\db\Migration;

/**
 * Class m230807_034423_seed_test_types_table
 */
class m230807_034423_seed_test_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%test_types}}', [
            'name' => 'JavaScript',
        ]);

        $this->insert('{{%test_types}}', [
            'name' => 'Python',
        ]);

        $this->insert('{{%test_types}}', [
            'name' => 'React',
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230807_034423_seed_test_types_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230807_034423_seed_test_types_table cannot be reverted.\n";

        return false;
    }
    */
}
