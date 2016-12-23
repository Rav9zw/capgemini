<?php
namespace Config;
use \PDO;

class Database{
 
   
	
    private $host = "swiatrakeikord93.mysql.db";
    private $db_name = "swiatrakeikord93";
    private $username = "swiatrakeikord93";
    private $password = "Kordzik123";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
 
 
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}



?>