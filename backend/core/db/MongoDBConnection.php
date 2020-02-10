<?php
namespace core\db;

use Exception;

class MongoDBConnection 
{
    private $conn;
    /**
     * constructor
     * create database connection
     */
    public function __construct() 
    {

        $username= 'megahack';
        $password= 'Du2XvrcQntcHT!q';

        $dns= "mongodb+srv://{$username}:{$password}@megahack-rpgwt.gcp.mongodb.net/test?retryWrites=true&w=majority";
        $username= null;
        $passwd= null;

        try {
            $this->conn= new \Mongo($dns, $username, $passwd);
        } catch (Exception $e) {
            \debug($e);
        }
    }

    public function getConnection() : 
    {
        return $this->conn;
    }
}