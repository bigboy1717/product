<?php
class Database{
    private $host = "localhost";
    private $port = "3306";
    private $db_name = "Product";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";
    public $conn;
    private $options = [    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    public function connect_pdo()
    {
        $this->conn = NULL;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";
                            port=" . $this->port . ";  dbname=" . $this->db_name . ";  
                            charset=" . $this->charset,  $this->username, 
                            $this->password,  $this->options  );
        } catch (PDOException $exception) {
            echo "Ошибка соединения: " . $exception->getMessage();
        }         return $this->conn;
    }
    public function close_connect()
    {
        $this->conn = NULL;
    }  
    public function getInfPDO()
    {
        return $this->conn;
    }
}