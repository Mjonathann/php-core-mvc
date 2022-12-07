<?php 
namespace app\Controllers;
use Core\Controller ;

class homeController extends Controller {
    
    public function __construct() {

        /* if ($action == null) {
            return $this->defaultAction();
        } */

        
    }

    public function defaultAction(){
        $this->index();
    }

    public function index() {
        $this->renderView('index.php');
    }
    public function json() {
        $this->sendJson(array('test' => 'Send Json'));
    }

    public function partial() {
        $this->renderPartial('partial.php');
    }
}

?>