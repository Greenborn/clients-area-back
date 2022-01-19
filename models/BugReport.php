<?php

namespace app\models;

use Yii;
use app\models\BugReportImage;
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

    public function afterSave($insert, $changedAttributes) {
        $params = Yii::$app->getRequest()->getBodyParams();
        $date   = new \DateTime();

        for ($c=0; $c < count($params['images']); $c++){
            $file_name = 'public/bug_report/'.$date->getTimestamp().$params['images'][$c]['name'];
            $this->base64_to_file($params['images'][$c]['file'], $file_name);
            $imgBug                = new BugReportImage();
            $imgBug->bug_report_id = $this->id;
            $imgBug->src           = $file_name;
            $imgBug->save(false);
        }

        return parent::afterSave($insert, $changedAttributes);
    }

    private function base64_to_file($base64_string, $output_file) {
        // open the output file for writing
        $ifp = fopen( $output_file, 'wb' ); 
    
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );
    
        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );
    
        // clean up the file resource
        fclose( $ifp ); 
    
        return $output_file; 
    }
}
