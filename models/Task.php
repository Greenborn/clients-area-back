<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $order
 * @property int $proyect_id
 * @property int $column_id
 * @property string|null $created_at
 * @property string|null $uploaded_at
 * @property string|null $expiration
 *
 * @property Proyect $proyect
 * @property TaskColumn $column
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'proyect_id', 'column_id'], 'required'],
            [['description'], 'string'],
            [['order', 'proyect_id', 'column_id'], 'integer'],
            [['created_at', 'uploaded_at', 'expiration'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['proyect_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proyect::className(), 'targetAttribute' => ['proyect_id' => 'id']],
            [['column_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskColumn::className(), 'targetAttribute' => ['column_id' => 'id']],
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
            'order' => 'Order',
            'proyect_id' => 'Proyect ID',
            'column_id' => 'Column ID',
            'created_at' => 'Created At',
            'uploaded_at' => 'Uploaded At',
            'expiration' => 'Expiration',
        ];
    }

    /**
     * Gets query for [[Proyect]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProyect()
    {
        return $this->hasOne(Proyect::className(), ['id' => 'proyect_id']);
    }

    /**
     * Gets query for [[Column]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColumn()
    {
        return $this->hasOne(TaskColumn::className(), ['id' => 'column_id']);
    }
}
