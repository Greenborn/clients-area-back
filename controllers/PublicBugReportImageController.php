<?php
namespace app\controllers;

use yii\rest\ActiveController;


class PublicBugReportImageController extends PublicBaseController {

    public function actions(){
        $actions = parent::actions();
        unset( $actions['delete'],
               $actions['update'],
             );
  
        return $actions;
    }

    public $modelClass = 'app\models\BugReportImage';

}