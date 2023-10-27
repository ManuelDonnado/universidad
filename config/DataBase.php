<?php

class Database
{
    private $host, $username, $password, $dbname, $conexion, $pdo;

    public function __construct()
    {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "universidad";
        $this->conexion = "mysql:host=$this->host;dbname=$this->dbname";
    }

    public function connect()
    {
        $options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
        try {
            $this->pdo = new PDO($this->conexion, $this->username, $this->password, $options);
            return $this->pdo;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>