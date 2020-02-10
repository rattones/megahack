<?php
namespace core\db;

use Exception;

class Connection 
{
    private $conn;

    public function __construct()
    {
        
    }

    public function getConnection() : \PDO 
    {
        return $this->conn;
    }
}