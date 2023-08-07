<?php

use yii\db\Migration;

/**
 * Class m230807_035627_seed_users_table
 */
class m230807_035627_seed_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $this->insert(
                'users',
                [
                    'name' => $faker->name(),
                    'email' => $faker->email(),
                    'password' => $faker->md5(),
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230807_035627_seed_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230807_035627_seed_users_table cannot be reverted.\n";

        return false;
    }
    */
}
