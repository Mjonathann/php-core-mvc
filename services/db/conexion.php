<?php
Namespace Tools\db;

Class db {
    private $server = "localhost";
    private $database = "database";
    private $username = "root";
    private $password = "password";
    private $conection;
    private $errorConnection = "";

    public function __construct(){
        $conection = new \mysqli($this->server, $this->username, $this->password, $this->database);

        if ($conection === false) {
            $errorConnection = "ERROR: Could not connect to database. ". $conection->connec_error();
        }
    }

    public function query($query){
        $result = $this->conection->query($query);

        if (!$result) {
            return $this->errorConnection;
        }

        return $result;
    }

    // public function


}



?>