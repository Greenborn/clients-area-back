<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_interval".
 *
 * @property int $id
 * @property string $name
 * @property int $days
 *
 * @property Products[] $products
 */
class PaymentInterval extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_interval';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'days'], 'required'],
            [['days'], 'integer'],
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
            'days' => 'Days',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['payment_interval_id' => 'id']);
    }
}
