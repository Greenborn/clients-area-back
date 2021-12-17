<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact_type".
 *
 * @property int $id
 * @property int $name_translate_cod
 * @property int $id_name_translate_cod
 * @property int|null $order
 * @property int|null $logo_src
 *
 * @property TranslateTerms $nameTranslateCod
 * @property TranslateTerms $nameTranslateCod0
 */
class ContactType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_translate_cod', 'id_name_translate_cod'], 'required'],
            [['name_translate_cod', 'id_name_translate_cod', 'order', 'logo_src'], 'integer'],
            [['id_name_translate_cod'], 'exist', 'skipOnError' => true, 'targetClass' => TranslateTerms::className(), 'targetAttribute' => ['id_name_translate_cod' => 'cod']],
            [['name_translate_cod'], 'exist', 'skipOnError' => true, 'targetClass' => TranslateTerms::className(), 'targetAttribute' => ['name_translate_cod' => 'cod']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_translate_cod' => 'Name Translate Cod',
            'id_name_translate_cod' => 'Id Name Translate Cod',
            'order' => 'Order',
            'logo_src' => 'Logo Src',
        ];
    }

    /**
     * Gets query for [[NameTranslateCod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNameTranslateCod()
    {
        return $this->hasOne(TranslateTerms::className(), ['cod' => 'id_name_translate_cod']);
    }

    /**
     * Gets query for [[NameTranslateCod0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNameTranslateCod0()
    {
        return $this->hasOne(TranslateTerms::className(), ['cod' => 'name_translate_cod']);
    }
}
