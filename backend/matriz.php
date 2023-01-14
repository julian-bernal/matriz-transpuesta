<?php

class Matriz
{
    public function matrizTranspuesta($matriz)
    {
        if ($matriz) {
            die(json_encode(['code' => 'SUCCESS', 'error' => 'NOT_FOUND_DATA', 'data' => $matriz]));
        }

        die(json_encode(['code' => 'SUCCESS', 'error' => 'NOT_FOUND_DATA', 'data' => null]));
    }
}



