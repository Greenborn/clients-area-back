<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $description
 * @property int|null $traduction_id
 * @property string|null $flag_image_src
 *
 * @property Terms[] $terms
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['traduction_id'], 'integer'],
            [['description', 'flag_image_src'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'traduction_id' => 'Traduction ID',
            'flag_image_src' => 'Flag Image Src',
        ];
    }

    /**
     * Gets query for [[Terms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTerms()
    {
        return $this->hasMany(Terms::className(), ['language_id' => 'id']);
    }
}
