<?php
namespace app\controllers;

use yii\rest\ActiveController;
use app\controllers\PublicBaseController;


class ContactMessageController extends PublicBaseController {

    public function actions(){
        $actions = parent::actions();
        unset( $actions['delete'],
               $actions['index'],
               $actions['update'],
               $actions['view'],
             );
  
        return $actions;
    }

    public $modelClass = 'app\models\ContactMessage';
}
