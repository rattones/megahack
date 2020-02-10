<?php
namespace core\system;

use core\db\Connection;
use PDOException;
use PDOStatement;

class Model extends Connection
{
    public $db;

    public function __construct()
    {
        parent::__construct();
        $this->db= $this->getConnection();
        
    }

    public function execute(string $query) : PDOStatement
    {
        try {
            $stmt= $this->db->query($query); 
        } catch (PDOException $e) {
            \debug($e);
        }
            
        return ($stmt)? $stmt: new PDOStatement();
    }

    public function lastInsertId() 
    {
        try {
            $id= $this->db->lastInsertId();

            return $id;
        } catch (PDOException $e) {
            \debug($e);
        }
    }
}