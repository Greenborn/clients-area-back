<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact_message".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string|null $email
 * @property string|null $tel
 * @property string $message
 * @property string $datetime
 */
class ContactMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'message', 'datetime'], 'required'],
            [['message'], 'string'],
            [['datetime'], 'safe'],
            [['name', 'surname', 'email', 'tel'], 'string', 'max' => 255],
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
            'surname' => 'Surname',
            'email' => 'Email',
            'tel' => 'Tel',
            'message' => 'Message',
            'datetime' => 'Datetime',
        ];
    }
}
