<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "translate_terms".
 *
 * @property int $id
 * @property int $term_id_1
 * @property int|null $term_id_2
 * @property int $cod
 * @property int|null $zone_id
 *
 * @property ContactType[] $contactTypes
 * @property ContactType[] $contactTypes0
 * @property Terms $termId1
 * @property Terms $termId2
 */
class TranslateTerms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translate_terms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'term_id_1', 'cod'], 'required'],
            [['id', 'term_id_1', 'term_id_2', 'cod', 'zone_id'], 'integer'],
            [['id', 'cod'], 'unique', 'targetAttribute' => ['id', 'cod']],
            [['term_id_1'], 'exist', 'skipOnError' => true, 'targetClass' => Terms::className(), 'targetAttribute' => ['term_id_1' => 'id']],
            [['term_id_2'], 'exist', 'skipOnError' => true, 'targetClass' => Terms::className(), 'targetAttribute' => ['term_id_2' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'term_id_1' => 'Term Id 1',
            'term_id_2' => 'Term Id 2',
            'cod' => 'Cod',
            'zone_id' => 'Zone ID',
        ];
    }

    /**
     * Gets query for [[ContactTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContactTypes()
    {
        return $this->hasMany(ContactType::className(), ['id_name_translate_cod' => 'cod']);
    }

    /**
     * Gets query for [[ContactTypes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContactTypes0()
    {
        return $this->hasMany(ContactType::className(), ['name_translate_cod' => 'cod']);
    }

    /**
     * Gets query for [[TermId1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTermId1()
    {
        return $this->hasOne(Terms::className(), ['id' => 'term_id_1']);
    }

    /**
     * Gets query for [[TermId2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTermId2()
    {
        return $this->hasOne(Terms::className(), ['id' => 'term_id_2']);
    }
}
