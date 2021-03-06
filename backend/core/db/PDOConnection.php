<?php
namespace core\db;

use PDO;
use PDOException;

class PDOConnection 
{
    private $conn;
    /**
     * constructor
     * create database connection
     */
    public function __construct() 
    {
        $dns= "sqlite:./core/db/database.file";
        $username= null;
        $passwd= null;

        try {
            $this->conn= new PDO($dns, $username, $passwd);
        } catch (PDOException $e) {
            \debug($e);
        }
    }

    public function getConnection() : PDO 
    {
        return $this->conn;
    }
}