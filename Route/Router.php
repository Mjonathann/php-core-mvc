<?php
namespace Route;

require 'Config.php';

Class Router extends Config{
    public $controller;
    public $action;
    public $params;
    private $uri;
    public $route;
    public $arrayRoute;
    private $defaultController;
    const URL_SEPARATOR = "/";
    

    public function __construct($uri){
        parent::__construct();
        $this->defaultController = 'homeController';
        $this->uri = $uri;
        $this->setRoute($uri);
        $this->setArrayRoute($this->route);
        $this->setController($this->arrayRoute);
        $this->setAction($this->arrayRoute);
        $this->setParams($this->arrayRoute);
        
    }

    private function setRoute($uri){
        $route = '';
        //Elimina el queryString si existe
        //Ya que se puede acceder a el mediante $_GET
        if (strpos($uri, '?')) {
            $route = strstr($uri, '?',true);
        }else{
            $route = $uri;
        }

        //Elimina el ultimo '/' si existe
        $route = preg_replace('/\/$/','',$route);
        //Elimina el nombre del proyecto
        $pattern = '/^[\/]?' . $this->appName . '[\/]?/';
        $this->route = preg_replace($pattern,'',$route);

    }
    private function setArrayRoute($route){
        $this->arrayRoute = explode(self::URL_SEPARATOR,$route);
    }


    private function setController($arrayRoute){
        if (isset($arrayRoute[0]) && $arrayRoute[0] != '') {
        
            $nameController = $arrayRoute[0] . 'Controller';
            $this->controller = $nameController;
        }else{
            $this->controller =  "";
        }

        
    }
    private function setAction($arrayRoute){
        $action = isset($arrayRoute[1]) && $arrayRoute[1] != ''? $arrayRoute[1] : '';
        $this->action = $action;
    }
    private function setParams($arrayRoute){
        $this->params = count($arrayRoute) > 2 ? array_splice($arrayRoute, 2) : array();
    }
    public function getParams(){ 
        return $this->params; 
    }

    public function getController(){ 
        return $this->controller; 
    }

    public function getAction(){ 
        return $this->action; 
    }

    public function getControllerPath(){ 
        return $this->controllerPath;
    }
    public function getDefaultController(){
        return $this->defaultController;
    }
    public function getDefaultControllerPath(){ 
        return $this->defaultControllerPath;
    }  
}
