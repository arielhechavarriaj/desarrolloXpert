<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $id
 * @property int $test_id
 * @property string $text
 *
 * @property Answers[] $answers
 * @property Tests $test
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_id', 'text'], 'required'],
            [['test_id'], 'default', 'value' => null],
            [['test_id'], 'integer'],
            [['text'], 'string'],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tests::class, 'targetAttribute' => ['test_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'text' => 'Text',
        ];
    }

    /**
     * Gets query for [[Answers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answers::class, ['question_id' => 'id']);
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
}
