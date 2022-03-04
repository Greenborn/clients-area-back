<?php
namespace app\actions;

use Yii;
use yii\rest\IndexAction;
use app\models\RandomWords;

class GetRandomWord extends IndexAction {

  public function run() {
    $params = Yii::$app->request->get();
    $out    = [];
    $count  = 1;
    $length = NULL;

    if (isset($params['c']) && is_numeric($params['c']) && $params['c'] > 0 && $params['c'] < 100){
      $count = $params['c'];
    }

    if (isset($params['l']) && is_numeric($params['l']) && $params['l'] > 0 && $params['l'] < 100){
      $length = $params['l'];
    }
    
    $last_id = RandomWords::find()->orderBy('id DESC')->one()->id;

    if ($last_id == NULL){
      return [];
    }

    if ($last_id < $count){
      return [];
    }

    $whereParams = [];
    if ($length !== NULL){
      $whereParams['length'] = $length;
    }

    $c = 0;
    while ($c < $count){
      $rand_n = rand(1, $last_id);
      $whereParams['id'] = $rand_n;
      $find_r = RandomWords::find()->where( $whereParams )->one();
      if ($find_r != NULL){
        $out[] = $find_r->word;
        $c ++;
      }
      
    }
    
    return $out;
  }
}

