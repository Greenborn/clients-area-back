<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property int|null $order
 * @property int|null $root_category_id
 *
 * @property Category $rootCategory
 * @property Category[] $categories
 * @property PostCategorys[] $postCategorys
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['order', 'root_category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['root_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['root_category_id' => 'id']],
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
            'order' => 'Order',
            'root_category_id' => 'Root Category ID',
        ];
    }

    /**
     * Gets query for [[RootCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRootCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'root_category_id']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['root_category_id' => 'id']);
    }

    /**
     * Gets query for [[PostCategorys]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategorys()
    {
        return $this->hasMany(PostCategorys::className(), ['category_id' => 'id']);
    }
}
