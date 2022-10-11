<?php

//Cargar clase de controlador
spl_autoload_register(function ($class){
    $className = str_replace('\\', '/',$class);
    $path = BASE_PATH . 'app/' . $className . '.php';

    if (is_file($path)) {
         require_once $path;
    }
}); 

?>