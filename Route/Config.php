<?php
namespace Route; 

Class Config{
    protected $basePath;
    protected $baseUrl;
    protected $folderContainer;
    protected const PUBLIC_FOLDER = 'public';

    public function __construct(){
        $absolutePath = explode('\\',dirname(__DIR__));
        $folderContainer = end($absolutePath);
        $protocol = !empty($_SERVER['HTTPS'])? 'https://' : 'http://';
        $port = $_SERVER['SERVER_PORT'] == '80' ? '' : ':'. $_SERVER['SERVER_PORT'];

        $this->baseUrl = $protocol . $_SERVER['SERVER_NAME'] . $port . '/' ;
        $this->basePath = str_replace('\\','/',dirname(__DIR__)).'/';
        $this->folderContainer = $folderContainer;
    }

    public function getBasePath(){
        return strval($this->basePath);
    }
    public function getBaseUrl(){
        return strval($this->baseUrl);
    }
    public function getFolderName(){
        return strval($this->folderContainer);
    }
    
}

?>