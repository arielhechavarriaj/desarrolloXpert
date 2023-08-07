<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_results".
 *
 * @property int $id
 * @property int $user_id
 * @property int $test_id
 * @property int|null $score
 * @property string|null $results
 *
 * @property Tests $test
 * @property Users $user
 */
class User_result extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_results';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'test_id'], 'required'],
            [['user_id', 'test_id', 'score'], 'default', 'value' => null],
            [['user_id', 'test_id', 'score'], 'integer'],
            [['results'], 'string'],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tests::class, 'targetAttribute' => ['test_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'test_id' => 'Test ID',
            'score' => 'Score',
            'results' => 'Results',
        ];
    }

    /**
     * Gets query for [[Test]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Tests::class, ['id' => 'test_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}
