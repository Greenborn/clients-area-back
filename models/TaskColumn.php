<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task_column".
 *
 * @property int $id
 * @property string $name
 * @property int|null $order
 * @property int|null $proyect_id
 * @property string|null $created_at
 * @property string|null $uploaded_at
 *
 * @property Task[] $tasks
 * @property Proyect $proyect
 */
class TaskColumn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task_column';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['order', 'proyect_id'], 'integer'],
            [['created_at', 'uploaded_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['proyect_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proyect::className(), 'targetAttribute' => ['proyect_id' => 'id']],
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
            'proyect_id' => 'Proyect ID',
            'created_at' => 'Created At',
            'uploaded_at' => 'Uploaded At',
        ];
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['column_id' => 'id']);
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
}
