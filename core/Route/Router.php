<?php
namespace core\Route;
use tools\stringConvert;

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
        $this->defaultController = 'HomeController';
        $this->uri = $uri;
        $this->setRoute($uri);
        $this->setArrayRoute($this->route);
        $this->setController($this->arrayRoute);
        $this->setAction($this->arrayRoute);
        $this->setParams($this->arrayRoute);
        
    }

    private function setRoute($uri){
        $route = '';
        $exp = strtolower($this->folderContainer . '/' . self::PUBLIC_FOLDER . '/');
        //Elimina el queryString si existe
        //Ya que se puede acceder a el mediante $_GET
        if (strpos($uri, '?')) {
            $route = strstr($uri, '?',true);
        }else{
            $route = $uri;
        }       
        $route = strtolower($route);

        //Elimina el primer '/' 
        $route = preg_replace('/^[\/]?/','',$route);

        //Elimina el ultimo '/' si existe
        $route = preg_replace('/\/$/','',$route);
        
        //Elimina el nombre de la carpeta del proyecto y '/public'
        //Para cuando no se usa un host virtual
        if (!(strpos($route, $exp) === false)) {
            $route = str_replace($exp,'',$route);

            //$exp = preg_replace('/^[\/]?/','',$exp);
            $this->baseUrl .= $exp . '/';
        }

        $this->route = $route;
    }
    private function setArrayRoute($route){
        $this->arrayRoute = explode(self::URL_SEPARATOR,$route);
    }


    private function setController($arrayRoute){
        if (isset($arrayRoute[0]) && $arrayRoute[0] != '') {
        
            $nameController = $arrayRoute[0] . 'Controller';
            $this->controller = stringConvert::toCamel($nameController);
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

    public function getDefaultController(){
        return $this->defaultController;
    }
}
