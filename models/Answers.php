<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answers".
 *
 * @property int $id
 * @property int $question_id
 * @property string $text
 *
 * @property Questions $question
 */
class Answers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id', 'text'], 'required'],
            [['question_id'], 'default', 'value' => null],
            [['question_id'], 'integer'],
            [['text'], 'string'],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Questions::class, 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'text' => 'Text',
        ];
    }

    /**
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Questions::class, ['id' => 'question_id']);
    }
}
