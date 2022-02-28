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

    if (isset($params['c']) && is_numeric($params['c']) && $params['c'] > 0 && $params['c'] < 100){
      $count = $params['c'];
    }
    
    $last_id = RandomWords::find()->orderBy('id DESC')->one();

    if ($last_id == NULL || $last_id < $count){
      return [];
    }

    $c = 0;
    while ($c < $count){
      $rand_n = rand(1, $last_id);
      $find_r = RandomWords::find()->where(['id' => $rand_n])->one();
      if ($find_r != NULL){
        $out[] = $find_r->word;
        $c ++;
      }
      
    }
    
    return $out;
  }
}

