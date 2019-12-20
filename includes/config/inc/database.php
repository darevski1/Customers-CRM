<?php 
require_once("config.php");

class Database{

  public $conn;

  function __construct(){
    $this->getConnection();
 }

            // Database connection
 public function getConnection(){
   $this->conn = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);

   if($this->conn->connect_errno){
      die("Database connection failed") . $this->conn->connect_errno;
   }

}

}



$database = new Database();