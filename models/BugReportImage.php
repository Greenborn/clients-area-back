<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bug_report_image".
 *
 * @property int $id
 * @property string $src
 * @property int $bug_report_id
 *
 * @property BugReport $bugReport
 */
class BugReportImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bug_report_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['src', 'bug_report_id'], 'required'],
            [['bug_report_id'], 'integer'],
            [['src'], 'string', 'max' => 255],
            [['bug_report_id'], 'exist', 'skipOnError' => true, 'targetClass' => BugReport::className(), 'targetAttribute' => ['bug_report_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'src' => 'Src',
            'bug_report_id' => 'Bug Report ID',
        ];
    }

    /**
     * Gets query for [[BugReport]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBugReport()
    {
        return $this->hasOne(BugReport::className(), ['id' => 'bug_report_id']);
    }
}
