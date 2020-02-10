<?php
namespace app\model;

use core\system\Model;

class CategoryModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list() : array 
    {
        $query= "select * from categoria";
        $resultSet= $this->execute($query);
        
        $return= [];
        while ( $row= $resultSet->fetchObject() )
        {
            $return[]= $row;
        }

        return $return;
    }

    public function get(string $codigo) : \stdClass
    {
        $query= "select * from categoria where codigo = '{$codigo}'";
        $resultSet= $this->execute($query);

        $return= $resultSet->fetchObject();
        return ($return)? $return: new \stdClass();
    }

    public function update(string $codigo, array $data) : \stdClass 
    {
        $query= "update categoria set ";

        $sets= [];
        foreach ( $data as $field=>$value ) {
            $sets[]= " {$field}= '{$value}' ";
        }
        $query.= implode(',', $sets);
        $query.= " where codigo = '{$codigo}'";
        $this->execute($query);

        return $this->get($codigo); // fetching updated row and returning
    }

    public function insert(array $data) : \stdClass
    {
        $query= "insert into categoria ( ";

        $fields= [];
        $values= [];
        foreach ($data as $field=>$value) {
            $fields[]= $field;
            if ( is_string($value) ) {
                $value= "\"$value\"";
            }
            $values[]= $value;
        }

        $query.= implode(', ', $fields);
        $query.= " ) values ( ";
        $query.= implode(', ', $values);
        $query.= " ) ";

        $this->execute($query);

        $insertedId= $this->lastInsertId();

        return $this->get($insertedId);  // fetching inserted row and returning
    }

    public function delete(string $codigo) : bool
    {
        $query= "delete from categoria where codigo = '{$codigo}'";

        $resultSet= $this->execute($query);
        return ($resultSet->rowCount());
    }

    public function search(string $term) : array 
    {
        $query= "select * from categoria where nome like '%{$term}%'";
        $resultSet= $this->execute($query);
        
        $return= [];
        while ( $row= $resultSet->fetchObject() ) {
            $return[]= $row;
        }

        return $return;
   }

}