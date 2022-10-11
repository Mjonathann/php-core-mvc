<?php 
namespace Controllers;

class homeController {
    
    private $modelsPath;
    private $viewsPath;

    public function __construct() {
        $this->setModelPath();
        $this->setViewsPath();
        /* if ($action == null) {
            return $this->defaultAction();
        } */
    }
    private function setModelPath(){
        $this->modelsPath = BASE_PATH . "app/Models/home/";
    }
    private function setViewsPath(){
        $this->viewsPath = BASE_PATH . "app/Views/home/";
    }

    public function defaultAction(){
        $this->index();
    }

    public function index() {
        require_once $this->viewsPath . 'index.php';
    }
    public function test() {
        require_once $this->viewsPath . 'test.php';
    }
}

?>