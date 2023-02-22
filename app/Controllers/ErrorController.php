<?php
namespace app\Controllers;
use core\Controller;

class ErrorController extends Controller{
    
    public function defaultAction(){
        $this->index();
    }

    public function index() {
        header("HTTP/1.0 404 Not Found");
        $this->renderView('error404.php');
    }

    public function error404() {
        header("HTTP/1.0 404 Not Found");
        $this->renderView('error404.php');
    }
}