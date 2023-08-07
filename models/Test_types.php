<?php

namespace app\models;

use SebastianBergmann\CodeCoverage\Report\Xml\Tests;
use Yii;

/**
 * This is the model class for table "test_types".
 *
 * @property int $id
 * @property string $name
 *
 * @property Tests[] $tests
 */
class Test_types extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Tests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Tests::class, ['test_type_id' => 'id']);
    }
}
