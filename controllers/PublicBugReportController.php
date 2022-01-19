<?php
namespace app\controllers;

use yii\rest\ActiveController;


class PublicBugReportController extends PublicBaseController {

    public function actions(){
        $actions = parent::actions();
        unset( $actions['delete'],
               $actions['update'],
             );
  
        return $actions;
    }

    public $modelClass = 'app\models\BugReport';

}