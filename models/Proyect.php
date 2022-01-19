<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyect".
 *
 * @property int $id
 * @property string $name
 *
 * @property BugReport[] $bugReports
 */
class Proyect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
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
        ];
    }

    /**
     * Gets query for [[BugReports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBugReports()
    {
        return $this->hasMany(BugReport::className(), ['proyect_id' => 'id']);
    }
}
