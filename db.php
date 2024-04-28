<?php 


class DB{
    private $host;
    private $dbname;
    private $password;
    private $username;
    public $db;

    public function __construct($host, $username, $password, $dbname){
      $this->host = $host;
      $this->username = $username;
      $this->password = $password;
      $this->dbname = $dbname;
      $this->db = $this->connect();
    }

    
    private function connect(){
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $pdo = new PDO($dsn, $this->username, $this->password);
            if ($pdo) {
                return $pdo;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }
}