<?php
namespace app\controllers;

use yii\rest\ActiveController;


class PublicRandomWordController extends PublicBaseController {

    public function actions(){
        $actions = parent::actions();
        unset( $actions['delete'],
               $actions['create'],
               $actions['update'],
               $actions['view'],
             );
        $actions['index']['class'] = 'app\actions\GetRandomWord';
        return $actions;
    }

    public $modelClass = 'app\models\RandomWords';

}