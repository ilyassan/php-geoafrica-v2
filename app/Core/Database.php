<?php

class Database
{
    private $host = 'localhost';
    private $dbName = 'geoafrica-v2';
    private $username = 'root';
    private $password = '';
    private $pdo;
    private $stmt;
    private $error;

    public function __construct()
    {
        // Try to connect to the database
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbName}";
            $this->pdo = new PDO($dsn, $this->username, $this->password);

            // Best practice because of it help catching errrors
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            die("Database connection failed: " . $this->error);
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->pdo->prepare($sql);
    }

    public function bind($parameter, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value): 
                    $type = PDO::PARAM_INT; 
                    break;
                case is_bool($value): 
                    $type = PDO::PARAM_BOOL; 
                    break;
                case is_null($value): 
                    $type = PDO::PARAM_NULL; 
                    break;
                default: 
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($parameter, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);  // Fetch as an object
    }

    public function results()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch as an associative array
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
