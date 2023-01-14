<?php

class Matriz
{
    public function matrizTranspuesta($matriz)
    {
        if (!$matriz) {
            die(json_encode(['code' => 'ERROR', 'error' => 'NOT_FOUND_DATA', 'data' => $matriz]));
        }

        $sizeMatriz = count($matriz);

        $cad = '';

        $matrizTranspuesta = array();

        for ($i=0; $i < $sizeMatriz; $i++) { 
            
            array_push($matrizTranspuesta, []);

            for ($j=0; $j < $sizeMatriz; $j++) {
                $cad .= "$i-$j [{$matriz[$i][$j]}] ";
                array_push($matrizTranspuesta[$i], $matriz[$j][$i]);
            }

            $cad .= "\n";
        }
        // echo $cad;

        die(json_encode(['code' => 'SUCCESS', 'error' => null, 'data' => $matrizTranspuesta]));
    }
}



