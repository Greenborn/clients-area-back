<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "random_words".
 *
 * @property int $id
 * @property string $word
 * @property string|null $created_at
 */
class RandomWords extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'random_words';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['word'], 'required'],
            [['created_at'], 'safe'],
            [['word'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'word' => 'Word',
            'created_at' => 'Created At',
        ];
    }
}
