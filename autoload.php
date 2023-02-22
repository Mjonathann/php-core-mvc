<?php

//Cargar clase de controlador
spl_autoload_register(function ($class){
    $path = __DIR__  . '/' . $class . '.php';
    $path = str_replace('\\', '/',$path);

    if (is_file($path)) {
         require_once $path;
    }

}); 

?>