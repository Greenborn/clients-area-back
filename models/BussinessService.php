<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bussiness_service".
 *
 * @property int $id
 * @property int $id_name_translate_cod
 * @property int $id_description_translate_cod
 * @property int|null $order
 * @property string|null $img_src
 *
 * @property TranslateTerms $descriptionTranslateCod
 * @property TranslateTerms $nameTranslateCod
 */
class BussinessService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bussiness_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_name_translate_cod', 'id_description_translate_cod'], 'required'],
            [['id_name_translate_cod', 'id_description_translate_cod', 'order'], 'integer'],
            [['img_src'], 'string', 'max' => 255],
            [['id_description_translate_cod'], 'exist', 'skipOnError' => true, 'targetClass' => TranslateTerms::className(), 'targetAttribute' => ['id_description_translate_cod' => 'cod']],
            [['id_name_translate_cod'], 'exist', 'skipOnError' => true, 'targetClass' => TranslateTerms::className(), 'targetAttribute' => ['id_name_translate_cod' => 'cod']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_name_translate_cod' => 'Id Name Translate Cod',
            'id_description_translate_cod' => 'Id Description Translate Cod',
            'order' => 'Order',
            'img_src' => 'Img Src',
        ];
    }

    /**
     * Gets query for [[DescriptionTranslateCod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDescriptionTranslateCod()
    {
        return $this->hasOne(TranslateTerms::className(), ['cod' => 'id_description_translate_cod']);
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
}
