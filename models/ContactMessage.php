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
            [['name', 'message'], 'required'],
            [['message'], 'string'],
            [['name', 'surname', 'email', 'tel'], 'string', 'max' => 255],
        ];
    }

    public function beforeSave($insert) {
        $fechaHora  = new \DateTime();
        $this->datetime = $fechaHora->format('Y-m-d H:i:s');
        return parent::beforeSave($insert);
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
