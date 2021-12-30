<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tecnology".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $url
 * @property int|null $order
 * @property string|null $img_src
 */
class Tecnology extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tecnology';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['order'], 'integer'],
            [['name', 'url', 'img_src'], 'string', 'max' => 255],
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
            'url' => 'Url',
            'order' => 'Order',
            'img_src' => 'Img Src',
        ];
    }
}
