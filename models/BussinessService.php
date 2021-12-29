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
            [['order'], 'integer'],
            [['img_src'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order' => 'Order',
            'img_src' => 'Img Src',
        ];
    }
}
