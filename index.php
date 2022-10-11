<?php
/** Controlador Frontal */

use Route\Router;
//use Controllers as Controllers;

require_once 'Route/Router.php';
$uri = $_SERVER['REQUEST_URI'];
$router = new Router($uri);

//Constantes globales
define("BASE_PATH", $router->getBasePath());
define("BASE_URL", $router->getBaseUrl());
define("PARAMS", $router->getParams());

//Cargar clase de controlador
require_once( BASE_PATH . "Route/autoload.php");

//Cargar el header y menu de la pagina
require BASE_PATH . 'layout/header.phtml';
require BASE_PATH . 'layout/menu.phtml';

//Instanciar controlador
//Verifica que el controlador no este vacio
if ($router->getController() != '') {
     $controllerName = '\\Controllers\\' . $router->getController();
     $action = $router->getAction();
     
     if (class_exists($controllerName)) {
          $controller = new $controllerName();

          //Ejecutar accion pasada por parametro
          if (method_exists($controller, $action) && $action != '') {
               $controller->$action();

               //Si no se recibe la accion, se ejecuta la accion por defecto
          } else if ($action == '') {
               $controller->defaultAction();
          } else {
               header("HTTP/1.0 404 Not Found");
               echo '<br/><br/>Action not found';
          }
     } else {
          header("HTTP/1.0 404 Not Found");
          echo "<br/><br/>No controller not defined";
     }

     //Si el parametro controlador esta vacio, se instancia el controlador por defecto
} elseif ($router->getController() == '') {
     $defaultController = '\\Controllers\\' . $router->getDefaultController();
     $action = $router->getAction();
     if (class_exists($defaultController)) {
          $controller = new $defaultController();

          //Llama a la accion por defecto
          if (method_exists($controller, 'defaultAction')) {
               $controller->defaultAction();
          } else {
               header("HTTP/1.0 404 Not Found");
               echo '<br/><br/>Action not found';
          }
     } else {
          header("HTTP/1.0 404 Not Found");
          echo "<br/><br/>No controller not defined";
     }
} else {
     header("HTTP/1.0 404 Not Found");
     echo '<br/>No controller found';
}



require BASE_PATH . 'layout/footer.phtml';
