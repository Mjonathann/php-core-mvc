<?php namespace Core; 

    class Controller {

        protected const  MODELS_PATH = BASE_PATH . "app/Models/";
        protected const VIEWS_PATH = BASE_PATH . "app/Views/";

        public function __construct() {
            
               }

        public function renderView($view) {

            $childClass = str_replace('app\\Controllers\\','',get_called_class());
            $childClass = str_replace('Controller','',$childClass);

            //Cargar el header y menu de la pagina
            require BASE_PATH . 'layout/header.phtml';
            require BASE_PATH . 'layout/menu.phtml';
            require_once self::VIEWS_PATH . $childClass .'/'. $view;

            //Cargar el header y menu de la pagina
            require BASE_PATH . 'layout/footer.phtml';
        }

        public function renderPartial($view){
            $childClass = str_replace('app\\Controllers\\','',get_called_class());
            $childClass = str_replace('Controller','',$childClass);
            require_once self::VIEWS_PATH . $childClass .'/'. $view;
        }

        public function sendJson($partial) {
            header('Content-Type: application/json');
            echo json_encode($partial, JSON_UNESCAPED_UNICODE);
            exit();
        }
    
    }


?>