<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terms".
 *
 * @property int $id
 * @property string $value
 * @property int $language_id
 *
 * @property Language $language
 * @property TranslateTerms[] $translateTerms
 * @property TranslateTerms[] $translateTerms0
 */
class Terms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'terms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'language_id'], 'required'],
            [['value'], 'string'],
            [['language_id'], 'integer'],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'language_id' => 'Language ID',
        ];
    }

    /**
     * Gets query for [[Language]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * Gets query for [[TranslateTerms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTranslateTerms()
    {
        return $this->hasMany(TranslateTerms::className(), ['term_id_1' => 'id']);
    }

    /**
     * Gets query for [[TranslateTerms0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTranslateTerms0()
    {
        return $this->hasMany(TranslateTerms::className(), ['term_id_2' => 'id']);
    }
}
