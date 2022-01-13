<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bug_report".
 *
 * @property int $id
 * @property int $proyect_id
 * @property string $description
 * @property string|null $date
 *
 * @property Proyect $proyect
 * @property BugReportImage[] $bugReportImages
 */
class BugReport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bug_report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proyect_id', 'description'], 'required'],
            [['proyect_id'], 'integer'],
            [['description'], 'string'],
            [['date'], 'safe'],
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
            'proyect_id' => 'Proyect ID',
            'description' => 'Description',
            'date' => 'Date',
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
     * Gets query for [[BugReportImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBugReportImages()
    {
        return $this->hasMany(BugReportImage::className(), ['bug_report_id' => 'id']);
    }
}
