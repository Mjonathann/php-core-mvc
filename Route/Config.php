<?php
namespace Route; 

Class Config{
    protected $basePath;
    protected $baseUrl;
    protected $folderName;

    public function __construct(){
        $absolutePath = explode('\\',dirname(__DIR__));
        $folderName = end($absolutePath);
        $protocol = !empty($_SERVER['HTTPS'])? 'https://' : 'http://';
        $port = $_SERVER['SERVER_PORT'] == '80' ? '' : ':'. $_SERVER['SERVER_PORT'];

        $this->baseUrl = $protocol . $_SERVER['SERVER_NAME'] . $port . '/' ;
        $this->basePath = str_replace('\\','/',dirname(__DIR__)).'/';
        $this->folderName = $folderName;
    }

    public function getBasePath(){
        return strval($this->basePath);
    }
    public function getBaseUrl(){
        return strval($this->baseUrl);
    }
    public function getFolderName(){
        return strval($this->folderName);
    }
    
}

?>