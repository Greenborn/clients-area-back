<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $order
 * @property string|null $img_src
 * @property string|null $price
 * @property int $service_id
 * @property int $currency_id
 * @property int $payment_interval_id
 *
 * @property Currency $currency
 * @property PaymentInterval $paymentInterval
 * @property BussinessService $service
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'service_id', 'currency_id', 'payment_interval_id'], 'required'],
            [['description', 'price'], 'string'],
            [['order', 'service_id', 'currency_id', 'payment_interval_id'], 'integer'],
            [['name', 'img_src'], 'string', 'max' => 255],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['payment_interval_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentInterval::className(), 'targetAttribute' => ['payment_interval_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => BussinessService::className(), 'targetAttribute' => ['service_id' => 'id']],
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
            'description' => 'Description',
            'order' => 'Order',
            'img_src' => 'Img Src',
            'price' => 'Price',
            'service_id' => 'Service ID',
            'currency_id' => 'Currency ID',
            'payment_interval_id' => 'Payment Interval ID',
        ];
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * Gets query for [[PaymentInterval]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentInterval()
    {
        return $this->hasOne(PaymentInterval::className(), ['id' => 'payment_interval_id']);
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(BussinessService::className(), ['id' => 'service_id']);
    }

    public function extraFields() {
        return [ 'service', 'paymentInterval', 'currency' ];
    }
}
