<?php
namespace app\controllers;

use yii\rest\ActiveController;


class PrivateTaskColumnController extends BaseController {

    public function actions(){
        $actions = parent::actions();
        return $actions;
    }

    public $modelClass = 'app\models\TaskColumn';

}