<?php
namespace app\controllers;

use yii\rest\ActiveController;


class PrivateTaskController extends BaseController {

    public function actions(){
        $actions = parent::actions();
        return $actions;
    }

    public $modelClass = 'app\models\Task';

}