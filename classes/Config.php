<?php

class Config{
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "oop_practice";

    //create an initial variable/propery for $conn
    public $conn;

    public function __construct(){
        //Create the connection
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->database);

        //Check the connection
        if($this->conn->connect_error){
            //stop the connection and show error masseage
            die ("Connetion error" . $this->conn->connect_error);
        }
        return $this->conn;
    }
}

?>