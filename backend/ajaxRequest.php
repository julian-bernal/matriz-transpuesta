<?php

include '../backend/matriz.php';

$matriz = new Matriz();


$matriz->matrizTranspuesta(isset($_POST['matriz']) ? $_POST['matriz'] : null);
