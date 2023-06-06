<?php

/** Controlador Frontal */


require_once("../autoload.php");

use core\Route\Router as Router;
//use Controllers as Controllers;

// require_once 'Route/Router.php';
$uri = $_SERVER['REQUEST_URI'];
$router = new Router($uri);

//Constantes globales
define("BASE_PATH", $router->getBasePath());
define("BASE_URL", $router->getBaseUrl());
define("PARAMS", $router->getParams());

//Si el parametro controlador esta vacio, se instancia el controlador por defecto
if ($router->getController() == '') {

     $defaultController = 'app\\Controllers\\' . $router->getDefaultController();
     $action = $router->getAction();

     if (!class_exists($defaultController)) {
          $controller = new app\Controllers\errorController;
          $controller->error404();
          exit();
     }

     $controller = new $defaultController();

     //Llama a la accion por defecto
     if (!method_exists($controller, 'defaultAction')) {
          $controller = new app\Controllers\errorController;
          $controller->error404();
          exit();
     }

     $controller->defaultAction();
     exit();
}


//Instanciar controlador

$controllerName = 'app\\Controllers\\' . $router->getController();
$action = $router->getAction();

if (!class_exists($controllerName)) {
     
     //echo "<br/><br/>No controller not defined";
     $controller = new app\Controllers\errorController;
     $controller->error404();
     exit();
}

$controller = new $controllerName();

//Ejecutar accion pasada por parametro
if (method_exists($controller, $action) && $action != '') {
     $controller->$action();

     //Si no se recibe la accion, se ejecuta la accion por defecto
} else if (method_exists($controller, 'defaultAction') && $action == '') {
     $controller->defaultAction();
} else {
     
     //echo '<br/><br/>Action not found';
     $controller = new app\Controllers\errorController;
     $controller->error404();
     exit();
}
