<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

use app\models\RandomWords;

class CargarPalabrasAleatoriasController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */

    private function insertToDB($palabras){
        for($c=0; $c < count($palabras); $c++){
            if ( strlen($palabras[$c]) < 6 && strlen($palabras[$c]) > 254){
                continue;
            }

            $rw = RandomWords::find()->where(['word' => $palabras[$c]])->one();
            if ($rw == NULL){
                $fechaHora  = new \DateTime();

                $rw             = new RandomWords();
                $rw->word       = $palabras[$c];
                $rw->length     = strlen($palabras[$c]);
                $rw->created_at = $fechaHora->format('Y-m-d H:i:s');
                $rw->save(false);

                echo 'Se agrego palabra '.$palabras[$c]."\n";
            }
        }
    }

    public function actionIndex($ruta = '')
    {
        $caracteres_excluidos = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0','>','<','%','€','«','»','.',
                                 ':',',','_','-','(',')','[',']',';', '@', '*', '+', '"', "'", '&', '=', '¿', '?', 
                                 '!', '¡', '|', '~', '½', '¬', '·', '/', '^', '¨', 'º', '$', '#', '{', '}', "\n", 'ç',
                                 'ł', '€', '¶', 'ŧ', '←','↓', '→', 'ø', 'þ', 'æ', 'ß', 'ð', 'đ', 'ŋ', 'ħ', '¢', '─',
                                 'µ'];
        if ($ruta == ''){
            echo 'Es necesario especificar la ruta del archivo'. "\n";
            return ExitCode::OK;
        } 

        $archivo = fopen($ruta, 'r');

        while( !feof($archivo)){
            $linea = fgets($archivo);
            $linea = str_replace($caracteres_excluidos,'', $linea);
            $linea = strtolower($linea);
            $this->insertToDB( explode(' ', $linea) );
        }
        
        fclose($archivo);
        
        return ExitCode::OK;
    }
}
