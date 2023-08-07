<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "identity_providers".
 *
 * @property int $id
 * @property string $name
 *
 * @property ProviderAccounts[] $providerAccounts
 */
class Identity_providers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'identity_providers';
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
     * Gets query for [[ProviderAccounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProviderAccounts()
    {
        return $this->hasMany(ProviderAccounts::class, ['identity_provider_id' => 'id']);
    }
}
