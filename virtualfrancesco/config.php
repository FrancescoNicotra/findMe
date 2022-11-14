<?php

define("db_host","localhost");

define("db_user","francesco");
define("db_pass","root");
define("db_name","find_me");

class db_connect{

    public $host = db_host;
    public $user = db_user;
    public $name = db_name;
    public $pass = db_pass;
    public $conn;
    public $error;

    public function connect(){

        $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->name);

        if(!$this->conn){
            $this->error="Fatal Error: Non sono riuscito a connettermi al database".$this->connect->connect_error();
            return false;
        }
    }
}
